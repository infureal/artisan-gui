<template>
  <div class="w-full antialiased" :class="{'overflow-y-auto': selectedCommand == null, 'overflow-hidden': selectedCommand != null}">
    <div class="px-6 pb-4">

      <div class="container mx-auto">
        <top-bar @search="onSearch" :home="home"/>

        <div v-for="(group, key) in filteredGroups" :key="group.name">
          <group @select="onSelect" :name="key" :commands="group"/>
        </div>

      </div>
    </div>

<!-- Overlay -->
    <transition
        enter-active-class="transition-all ease-out-quad duration-300"
        leave-active-class="transition-all ease-in-quad duration-50"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
    >
      <div v-if="selectedCommand != null || loading" @click="selectedCommand = null" class="fixed w-full h-full top-0 left-0" :class="{'cursor-pointer': selectedCommand != null}">
        <div class="bg-black opacity-20 w-full h-full"></div>
      </div>
    </transition>
<!-- Sidebar  -->
    <transition
        enter-active-class="transition-all ease-out-quad duration-300"
        leave-active-class="transition-all ease-in-quad duration-50"
        enter-class="transform translate-x-full"
        enter-to-class="transform translate-x-0"
        leave-class="transform translate-x-0"
        leave-to-class="transform translate-x-full"
    >
      <div v-if="selectedCommand != null" class="fixed max-w-lg w-full h-full overflow-x-hidden bg-white overflow-y-auto top-0 right-0">
        <command-sidebar :old="old" :errors="errors" @run="runCommand" @close="selectedCommand = null" :command="selectedCommand" />
      </div>

    </transition>
<!-- Loading spinner -->
    <transition
        enter-active-class="transition-all ease-out-quad duration-300"
        leave-active-class="transition-all ease-in-quad duration-50"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
    >
    <div v-if="loading" class="fixed w-full h-full top-0 left-0 flex items-center justify-center text-primary-500">
      <div class="w-8 h-8 text-primary-500 animate-spin">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-full h-full" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
        </svg>
      </div>
    </div>
    </transition>

    <transition
        enter-active-class="transition-all ease-out-quad duration-300"
        leave-active-class="transition-all ease-in-quad duration-50"
        enter-class="transform translate-y-full"
        enter-to-class="transform translate-y-0"
        leave-class="transform translate-y-0"
        leave-to-class="transform translate-y-full"
    >
    <div v-if="output != null" class="w-full fixed bottom-0 left-0 mb-6">

      <div @click="output = null" class="container mx-auto cursor-pointer rounded-2xl overflow-hidden px-4 md:px-0">
        <command-output :command="output.command" :status="output.status" :output="output.output.replaceAll('\n', '<br />')" />
      </div>

    </div>
    </transition>

  </div>

</template>

<script>
import TopBar from "./components/TopBar";
import Group from "./components/Group";
import CommandSidebar from "./components/CommandSidebar";
import Output from "./components/CommandOutput";
import CommandOutput from "./components/CommandOutput";

export default {
  components: {CommandOutput, CommandSidebar, Group, TopBar},
  props: ['endpoint', 'home'],
  data() {
    return {
      groups: [],
      loading: false,
      selectedCommand: null,
      search: '',
      errors: [],
      old: null,
      output: null,
    }
  },
  created() {
    this.$axios.defaults.baseURL = this.endpoint;
    this.fetchGroups();
  },
  computed: {
    filteredGroups() {

      if (this.search === '')
        return this.groups;

      let res = {};

      for (let key of Object.keys(this.groups ?? {})) {
        let group = this.groups[key];

        if (key.toLowerCase().includes(this.search.toLowerCase())) {
          res[key] = group;
          continue;
        }

        let tmpGroup = [];

        for (let command of group) {

          if (command.name.toLowerCase().includes(this.search.toLowerCase())) {
            tmpGroup.push(command);
          }

        }

        if (tmpGroup.length > 0)
          res[key] = tmpGroup;

      }

      return res;
    }
  },
  methods: {
    fetchGroups() {
      this.loading = true;

      this.$axios.get('/')
          .then((response) => {
            this.groups = response.data;
          })
          .catch((err) => console.log(err))
          .finally(() => this.loading = false)

    },
    onSelect(command) {
      this.errors = [];
      this.old = null;
      this.output = null;

      if (command.arguments == null && command.options == null)
        this.runCommand(command)
      else
        this.selectedCommand = command;

    },
    runCommand(command, formData) {
      this.loading = true;

      this.$axios.post(command.name, formData)
        .then((response) => {
          this.output = response.data;
        })
        .catch((err) => {
          this.selectedCommand = command;
          let data = err.response.data;

          if (data.errors)
            this.errors = data.errors;

          this.old = {};

          formData.forEach((val, k) => this.old[k] = val);
        })
        .finally(() => {
          this.loading = false;
        });

    },
    onSearch(search) {
      this.search = search
    }
  }
}
</script>

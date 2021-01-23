<template>
  <form ref="form" @submit.prevent="onSubmit" class="flex flex-col h-full relative">


    <div class="sticky top-0 bg-white px-6 py-4">

      <div class="flex items-center justify-between mb-2">

        <div class="text-2xl">
          {{ command.name }}
        </div>

        <button @click="$emit('close')"
                class="focus:outline-none flex items-center justify-center h-10 w-10 rounded-full bg-white hover:shadow-xl text-gray-500 hover:text-gray-800 hover:bg-gray-100 transition ease-in-out duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-4 w-4" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>

      </div>

      <div class="text-xs text-gray-400" :class="{'mb-6': command.arguments != null}">
        {{ command.description }}
      </div>

      <div v-if="command.arguments != null">
        <div v-for="argument in command.arguments" :key="argument.name" class="mt-4">
          <argument-input
              :old="old ? (old[argument.name] ? old[argument.name] : null) : null"
              :error="errors ? (errors[argument.name] ? errors[argument.name][0] : null) : null"
              :argument="argument"
              :command="command"
          />
        </div>
      </div>

    </div>

    <div class="flex-1 bg-gray-50 px-6 py-5">

      <div v-if="command.options != null" class="-my-6">

        <div v-for="option in command.options" :key="option.name" class="my-6">
          <option-input
              :old="old ? (old[option.name] ? old[option.name] : null) : null"
              :error="errors ? (errors[option.name] ? errors[option.name][0] : null) : null"
              :command="command"
              :option="option"
          />
        </div>

      </div>

    </div>

      <button class="flex items-center justify-end sticky bottom-0 px-8 py-6 text-xl bg-primary-500 text-white tracking-widest hover:bg-primary-600 focus:outline-none transition ease-in-out duration-200">
        <span class="block mr-3">
          Run
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-4 h-4 mt-1" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </button>

  </form>
</template>

<script>
import ArgumentInput from "./Sidebar/ArgumentInput";
import OptionInput from "./Sidebar/OptionInput";
export default {
  components: {OptionInput, ArgumentInput},
  props: ['command', 'errors', 'old'],
  data() {
    return {}
  },
  mounted() {

  },
  methods: {
    onSubmit() {
      let fd = new FormData(this.$refs.form);
      let res = {};

      this.$emit('run', this.command, fd);
      this.$emit('close');
    }
  }
}
</script>
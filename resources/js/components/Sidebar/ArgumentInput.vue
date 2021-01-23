<template>
<div>
  <label :for="id" class="flex items-center text-gray-500 mb-1">
    {{ argument.title }}
    <div class="px-1 py-px rounded text-xs ml-2" :class="argument.required ? 'bg-red-100 text-red-500' : 'text-green-500 bg-green-100'">
      {{ argument.required ? 'Required' : 'Optional' }}
    </div>
  </label>
  <input class="px-5 py-3 w-full border rounded-lg focus:border-primary-500 transition ease-in-out duration-200 focus:outline-none"
         type="text"
         :id="id"
         :name="argument.name"
         :placeholder="'Enter ' + argument.title.toLowerCase() + '...'"
         v-model="value"
         @focus="errorMessage = ''"
  >
  <div class="text-xs mt-1">
    <div class="text-gray-400" v-if="argument.description != null && !errorMessage">
      {{ argument.description }}
    </div>

    <div class="text-red-800 opacity-80" v-else-if="errorMessage">
      {{ errorMessage }}
    </div>
  </div>
</div>
</template>

<script>
export default {
  props: ['argument', 'command', 'error', 'old'],
  mounted() {

    if (this.old)
      this.value = this.old

    if (this.error)
      this.errorMessage = this.error

  },
  data() {
    return {
      value: '',
      errorMessage: ''
    }
  },
  computed: {
    id() {
      return this.argument.name + this.command.name
    }
  }
}
</script>
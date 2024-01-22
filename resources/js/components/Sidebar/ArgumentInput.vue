<template>
  <div>
    <label :for="id" class="flex items-center text-gray-500 mb-1">
      {{ argument.title }}
      <div :class="argument.required ? 'bg-red-100 text-red-500' : 'text-green-500 bg-green-100'"
           class="px-1 py-px rounded text-xs ml-2">
        {{ argument.required ? 'Required' : 'Optional' }}
      </div>
    </label>
    <input
        :id="id"
        v-model="value"
        :name="argument.name"
        :placeholder="'Enter ' + argument.title.toLowerCase() + '...'"
        class="px-5 py-3 w-full border rounded-lg focus:border-primary-500 transition ease-in-out duration-200 focus:outline-none"
        type="text"
        @focus="errorMessage = ''"
    >
    <div class="text-xs mt-1">
      <div v-if="argument.description != null && !errorMessage" class="text-gray-400">
        {{ argument.description }}
      </div>

      <div v-else-if="errorMessage" class="text-red-800 opacity-80">
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
    else if (this.argument.default)
      this.value = this.argument.default

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
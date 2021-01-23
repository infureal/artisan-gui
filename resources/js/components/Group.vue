<template>
  <div class="mt-6 mb-10">
    <div class="text-3xl text-gray-400 mb-6">
      {{ name }}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <command-card @select="$emit('select', command)" :command="command" v-for="command in commands" :key="command.name" />
    </div>

  </div>
</template>

<script>
import CommandCard from "./CommandCard";

export default {
  components: {CommandCard},
  props: ['name', 'commands']
}
</script>
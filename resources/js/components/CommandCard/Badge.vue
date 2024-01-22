<template>
  <div class="text-xs flex items-center">

    <div :class="{'bg-gray-100 text-gray-500': !active, 'bg-red-50 text-red-500': active}"
         class="rounded-l-md px-2 py-1 transition ease-in-out duration-200">
      {{ name }}
    </div>

    <div :class="{'bg-gray-200 text-gray-600': !active, 'bg-red-100 text-red-600': active}"
         class="rounded-r-md px-2 py-1 transition ease-in-out duration-200">
      {{ count }}
    </div>

  </div>
</template>

<script>
export default {
  props: ['name', 'count', 'active']
}
</script>

<style scoped>

</style>
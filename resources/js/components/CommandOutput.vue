<template>

  <div class="rounded-2xl shadow-2xl bg-gray-800 text-gray-300 p-6 overflow-y-auto" style="max-height: 50vh;">
    <div class="mb-4 flex">
      <div class="bg-primary-500 text-white px-3 py-1 rounded-lg">
        {{ command }}
      </div>
    </div>

    <div class="mb-4 text-gray-500">
      Status: {{ status }}
    </div>

    <div class="whitespace-pre" v-html="styledOutput">
    </div>
  </div>

</template>

<script>
import { parse } from 'ansicolor';

export default {
  props: ['command', 'status', 'output'],
  computed: {
    styledOutput() {
      const { spans } = parse(this.output);

      let styled = ''
      for (let span of spans) {
        styled += `<span style="${span.css}">${span.text}</span>`
      }

      return styled
    }
  }
}
</script>
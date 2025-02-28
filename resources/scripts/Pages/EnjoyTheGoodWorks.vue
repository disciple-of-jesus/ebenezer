<script>
import {router} from "@inertiajs/vue3";

export default {
  data() {
    return {
      currentState: 'TO_DO',
      form: {
        nameOfWork: ''
      },
      summaryOfEffort: ''
    }
  },
  props: {
    works: Array
  },
  methods: {
    assignGodlyWork() {
      router.post(`/works`, this.form)
    },
    changeTheCurrentState(work) {
      router.put(`/works/${work.id}`, {currentState: work.currentState});
    },
    enjoyTheEffort(work) {
      router.post(`/works/${work.id}/effort`, {summaryOfEffort: work.summaryOfEffort})
    }
  }
}
</script>

<template>
  (Goede) werken

  <div class="content">
    <form @submit.prevent="assignGodlyWork">
      <input v-model="form.nameOfWork" class="input" name="nameOfWork" type="text"/>
      <input id="assignWork" class="button" type="submit" value="Toekennen"/>
    </form>
  </div>

  <ul>
    <li v-for="work in works" :key="work.id" class="box">
      <div class="content">
        <h1 class="is-uppercase">{{ work.nameOfWork }}</h1>
        <ul>
          <li v-for="effort in work.effort" :key="effort.id">
            {{ effort.toiledAt }}: {{ effort.summaryOfEffort }}
          </li>
        </ul>
      </div>
      <form @submit.prevent="changeTheCurrentState(work)">
        <select v-model="work.currentState" name="currentState">
          <option value="TO_DO">
            Te doen
          </option>
          <option value="DOING">
            Bezig
          </option>
          <option value="DONE">
            Gedaan
          </option>
        </select>

        <input id="changeCurrentState" class="button" type="submit"/>
      </form>
      <form @submit.prevent="enjoyTheEffort(work)">
        <input v-model="work.summaryOfEffort" class="input mb-2" name="summaryOfEffort" type="text"/>

        <input id="enjoyEffort" class="button" type="submit"/>
      </form>
    </li>
  </ul>
</template>
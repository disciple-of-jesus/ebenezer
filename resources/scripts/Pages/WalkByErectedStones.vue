<template>
  <div class="block">
    <div class="box">
      <form @submit.prevent="erectStoneOfRemembrance">
        <div class="field">
          <label class="label" for="nameOfStone">Naam</label>
          <div class="control">
            <input v-model="form.nameOfStone" class="input" name="nameOfStone" type="text"/>
          </div>
        </div>

        <div class="field">
          <label class="label" for="contextToWord">Context</label>
          <div class="control">
            <textarea v-model="form.contextToWord" class="textarea" name="contextToWord"></textarea>
          </div>
        </div>

        <input id="erectStoneButton" class="button" type="submit" value="Oprichten"/>
      </form>
      <hr/>
      <form @submit.prevent="walkByStones">
        <div class="field">
          <label class="label" for="query">Waarde</label>
          <div class="control">
            <input v-model="query" class="input" name="query" type="text"/>
          </div>
        </div>

        <input id="walkByStonesButton" class="button" type="submit" value="Zoeken"/>
      </form>
    </div>

    <div v-for="(stone, index) in stonesOfRemembrance" :key="stone.id"
         :class="{ 'mb-0': index === stonesOfRemembrance.length - 1 }"
         class="box">
      <div class="content">
        <h1 class="is-uppercase">{{ stone.nameOfStone }}</h1>
        <p>{{ stone.contextToWord }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import {router} from "@inertiajs/vue3";

export default {
  props: {
    space: Object,
    stonesOfRemembrance: Array
  },
  data() {
    return {
      form: {
        nameOfStone: '',
        contextToWord: ''
      },
      query: ''
    };
  },
  methods: {
    erectStoneOfRemembrance() {
      router.post(`/spaces/${this.space.id}/stones-of-remembrance`, this.form);
    },
    walkByStones() {
      router.get(`/spaces/${this.space.id}?query=${this.query}`)
    },
    formatDate(date) {
      const options = {year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit'};
      return new Date(date).toLocaleDateString('nl-NL', options).replace(',', '');
    }
  }
};
</script>

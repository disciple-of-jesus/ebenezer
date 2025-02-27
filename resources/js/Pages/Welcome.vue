<script setup>
import {router} from '@inertiajs/vue3'

function assignSpaceToErectStones() {
  router.post('/spaces')
}
</script>

<template>
  <div class="container">
    <div class="box has-text-centered">
      <p>Maak hier uw eigen (virtuele) grond aan waar u Zijn stenen op kunt plaatsen.</p>
      <form class="mt-4" @submit.prevent="assignSpaceToErectStones">
        <button class="button" type="submit">Toekennen</button>
      </form>
    </div>
  </div>
</template>
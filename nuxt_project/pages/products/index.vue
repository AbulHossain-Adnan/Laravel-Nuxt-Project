<template lang="">
  <div>
    <Nav />
    <div class="container">
      <LargeCardDisplay
        v-for="cardInfo in largeCardInfo"
        :key="cardInfo.id"
        :cardsSection="cardInfo"
      />

      <SmallCardDisplay
        v-for="cardInfo in smallCardSections"
        :key="cardInfo.id"
        :SmallcardsSection="cardInfo"
      />
    </div>
  </div>
</template>
<script>
import { largeCardSections, smallCardSections } from "@/assets/data.js";
export default {
  data() {
    return {
      largeCardInfo: largeCardSections,
      smallCardSections: smallCardSections,
    };
  },
};
</script>
<style lang=""></style>

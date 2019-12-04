<template>
  <v-card color="grey darken-3" style="">
    <v-card-title>
      <v-flex class="pl-5 font-weight-light grey--text text--lighten-1 text-left">
        Current Projects
      </v-flex>
      <v-btn icon color="grey lighten-2" @click="$emit('close')"
        ><v-icon>fas fa-times</v-icon></v-btn
      >
    </v-card-title>
    <v-card-text>
      <v-list class="text-left" dark>
        <v-list-item three-line>
          <v-list-item-content>
            <v-list-item-title class="title">
              Laravue SPA
            </v-list-item-title>
            <v-list-item-subtitle>
              Single page application framework built on Laravel, Vuejs & Vuetify.
            </v-list-item-subtitle>
            <v-list-item-subtitle class="font-italic">
              <a href="https://laravue-spa.wheelmaker.dev" target="_blank">
                laravue-spa.wheelmaker.dev
              </a>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <v-list-item three-line>
          <v-list-item-content>
            <v-list-item-title class="title">
              Bella B
            </v-list-item-title>
            <v-list-item-subtitle>
              Brick and mortar clothing boutique in downtown San Luis Obispo, CA. and
              Shopify web store.
            </v-list-item-subtitle>
            <v-list-item-subtitle class="font-italic">
              <a href="https://bellab.com" target="_blank">
                www.bellab.com
              </a>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-list-item three-line>
          <v-list-item-content>
            <v-list-item-title class="title">
              Coveted Clothing
            </v-list-item-title>
            <v-list-item-subtitle>
              Web based wholesale clothing brand and distributor powered by Shopify and
              Coveted Systems.
            </v-list-item-subtitle>
            <v-list-item-subtitle class="font-italic">
              <a href="https://covetedclothing.com" target="_blank">
                www.covetedclothing.com
              </a>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <v-list-item three-line>
          <v-list-item-content>
            <v-list-item-title class="title">
              Lift Mas
            </v-list-item-title>
            <v-list-item-subtitle>
              Weightlifting lifestyle brand powered by Shopify and Coveted Systems.
            </v-list-item-subtitle>
            <v-list-item-subtitle class="font-italic">
              <a href="https://liftmas.com" target="_blank">
                www.liftmas.com
              </a>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <v-list-item three-line>
          <v-list-item-content>
            <v-list-item-title class="title">
              Coveted Systems
              <span class="font-italic" style="font-size: 1rem">( pre-beta )</span>
            </v-list-item-title>
            <v-list-item-subtitle>
              Software I've been using internally for my businesses, packaged up and made
              available to other apparel companies.
            </v-list-item-subtitle>
            <v-list-item-subtitle class="font-italic">
              <a href="https://coveted.systems" target="_blank">
                coveted.systems
              </a>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
        <v-list-item three-line>
          <v-list-item-content>
            <v-list-item-title class="title">
              Task Outstanding
              <span class="font-italic" style="font-size: 1rem">( pre-beta )</span>
            </v-list-item-title>
            <v-list-item-subtitle>
              Inter-personal single action task management born out of my own frustrations
              with requesting and tracking simple tasks to completion.
            </v-list-item-subtitle>
            <v-list-item-subtitle class="font-italic">
              <a href="https://taskoutstanding.com" target="_blank">
                www.taskoutstanding.com
              </a>
            </v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-card-text>
    <v-card-actions> </v-card-actions>
  </v-card>
</template>

<script>
  export default {
    name: "Websites"
  }
</script>

<style scoped>
  a {
    color: #efefef;
    text-decoration: none;
  }
</style>

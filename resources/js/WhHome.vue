<template>
    <v-app id="vApp" style="background: #222">
        <v-container class="fill-height" style="z-index: 1001;">
            <v-row align="center" justify="center">
                <v-col class="text-center">
                    <v-flex class="display-1 font-weight-light white--text mb-5">
                        <span class="font-weight-medium">
                          MATT
                        </span>
                        RADEMACHER
                    </v-flex>
                    <v-row justify="center" max-width="200">
                        <icon-buttons :show-contact-form="showContactForm" @toggleContact="toggleContact"></icon-buttons>
                    </v-row>
                    <v-expand-transition>
                        <v-row class="pt-5 mt-5" justify="center" v-show="showContactForm">
                            <v-spacer></v-spacer>
                            <v-flex cols>
                                <contact-form @close="showContactForm = !showContactForm"></contact-form>
                            </v-flex>
                            <v-spacer></v-spacer>
                        </v-row>
                    </v-expand-transition>
                </v-col>
            </v-row>
        </v-container>
    </v-app>
</template>

<script>
    import IconButtons from "./IconButtons";
    export default {
        name: "Home",
        components: {IconButtons},
        data: () => ({
            showContactForm: false,
        }),
        methods: {
            toggleContact() {
                this.showContactForm = !this.showContactForm;
            }
        }
    }
</script>


<style>

</style>

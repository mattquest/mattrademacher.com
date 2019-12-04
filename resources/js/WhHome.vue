<template>
    <v-app id="vApp" style="background: #222">
        <v-container class="pb-5 mb-5 fill-height" style="z-index: 1001;">
            <v-row class="pb-5 mb-5" align="center" justify="center">
                <v-col class="text-center">

                    <!--NAME-->
                    <v-row>
                        <v-flex justify="center" class="pb-5 mb-5 white--text display-1 text-center">
                            MATT<span class="font-weight-light">RADEMACHER</span>
                        </v-flex>
                    </v-row>

                    <!--ICON BUTTONS-->
                    <v-row justify="center" max-width="200">

                            <icon-buttons
                                v-show="!showContactForm && !showWebsites"
                                :show-contact-form="showContactForm"
                                @toggleContact="toggleContact()"
                                @toggleWebsites="toggleWebsites()"
                            ></icon-buttons>
                    </v-row>

                    <!--WEBSITES-->
                    <v-expand-transition>
                        <v-row class="pt-5 mt-5" justify="center" v-show="showWebsites">
                            <v-spacer></v-spacer>
                            <v-flex cols>
                                <websites @close="toggleWebsites()"></websites>
                            </v-flex>
                            <v-spacer></v-spacer>
                        </v-row>
                    </v-expand-transition>

                    <!--CONTACT FORM-->
                    <v-expand-transition>
                        <v-row class="pt-5 mt-5" justify="center" v-show="showContactForm">
                            <v-spacer></v-spacer>
                            <v-flex cols>
                                <contact-form
                                    @snackBar="msg => showSnackBar(msg)"
                                    @close="showContactForm = !showContactForm"
                                ></contact-form>
                            </v-flex>
                            <v-spacer></v-spacer>
                        </v-row>
                    </v-expand-transition>

                </v-col>
            </v-row>

        </v-container>
        <!--SNACKBAR-->
        <v-snackbar
            v-model="snackBar.show"
            color="white"
            class="blue-grey--text"
            bottom
        >
            <v-flex class="text-center font-weight-bold">
                {{ snackBar.text }}
            </v-flex>
        </v-snackbar>
    </v-app>
</template>

<script>
    import IconButtons from "./IconButtons";
    import Websites from "./Websites";

    export default {
        name: "Home",
        components: {Websites, IconButtons},
        data: () => ({
            showContactForm: false,
            showWebsites: false,
            snackBar: {
                show: false,
                text: null,
            },
            logoImage: vaporAssets.logoImage,
        }),
        methods: {
            toggleContact() {
                this.showContactForm = !this.showContactForm;
            },
            toggleWebsites() {
                this.showWebsites = !this.showWebsites;
            },
            showSnackBar(msg) {
                this.snackBar.text = msg;
                this.snackBar.show = true;
            }
        }
    }
</script>

<style>
</style>

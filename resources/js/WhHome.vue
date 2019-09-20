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
                        <v-flex>
                            <v-tooltip color="black" bottom>
                                <template v-slot:activator="{ on }">
                                    <v-btn v-on="on" class="mx-5 px-5" icon href="https://github.com/mattquest">
                                        <v-icon color="white" size="42px">fab fa-github</v-icon>
                                    </v-btn>
                                </template>
                                <span>Github</span>
                            </v-tooltip>
                            <v-tooltip color="orange" bottom>
                                <template v-slot:activator="{ on }">
                                    <v-btn
                                        v-on="on"
                                        target="_blank"
                                        class="mx-5 px-5"
                                        icon
                                        href="https://stackoverflow.com/users/2227763/wheelmaker"
                                    >
                                        <v-icon color="white" size="42px">fab fa-stack-overflow</v-icon>
                                    </v-btn>
                                </template>
                                <span>Stack Overflow</span>
                            </v-tooltip>
                            <v-btn class="mx-5 px-5" icon @click="toggleContact()">
                                <v-icon color="white" size="42px">fas fa-envelope</v-icon>
                            </v-btn>
                        </v-flex>
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
    export default {
        name: "Home",
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

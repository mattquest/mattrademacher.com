<template>
    <v-container>
        <v-row class="pt-5">
            <v-spacer></v-spacer>
            <v-col cols="3">
                <v-btn :loading="botCheckPending" dark class="" icon @click="downloadResume">
                    <v-icon class="grey--text text--lighten-3" size="60px">fas fa-file-alt</v-icon>
                </v-btn>
                <v-flex py-2 mt-1 class="white--text">
                    résumé
                </v-flex>
            </v-col>

            <v-col cols="3">
                <v-btn target="_blank" class="" icon href="https://github.com/mattquest">
                    <v-icon color="grey" size="60px">fab fa-github</v-icon>
                </v-btn>
                <v-flex py-2 mt-1 class="white--text">
                    github
                </v-flex>
            </v-col>
            <v-col align="middle" cols="3">
                <v-btn
                    target="_blank"
                    class=""
                    icon
                    href="https://stackoverflow.com/users/2227763/wheelmaker"
                >
                    <v-icon color="orange" size="60px">fab fa-stack-overflow</v-icon>
                </v-btn>
                <v-flex py-2 mt-1 class="white--text" style="">
                    stack overflow
                </v-flex>
            </v-col>
            <v-spacer></v-spacer>
            <form id="resumeForm" method="post" action="/download-resume">
                <input type="hidden" :value="csrf" name="_token">
                <input type="hidden" :value="recaptchaToken" name="token">
            </form>
        </v-row>
        <v-row v-show="!showContactForm" class="pt-5">
            <v-col>
                <v-btn class="mx-5 px-5" icon @click="toggleContact()">
                    <v-icon class="blue-grey--text text--lighten-1" size="70px">fas fa-envelope</v-icon>
                </v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    export default {
        name: "IconButtons",
        props: ['showContactForm'],
        data: () => ({
            botCheckPending: false,
            recaptchaToken: null,
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }),
        methods: {
            toggleContact() {
                this.$emit('toggleContact');
            },
            downloadResume() {
                this.botCheckPending = true;
                this.$recaptcha('downloadresume').then(token => {
                    this.recaptchaToken = token;
                    setTimeout(() => {
                        document.getElementById("resumeForm").submit();
                        this.botCheckPending = false;
                    }, 1000);
                });
            }
        }
    }
</script>

<style scoped>

</style>

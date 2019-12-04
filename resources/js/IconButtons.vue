<template>
    <v-container>
        <v-flex>
        <v-row class="pt-5">
            <v-col cols="4">
                <v-btn :loading="botCheckPending" dark class="" icon @click="downloadResume">
                    <v-icon class="grey--text text--lighten-3" size="60px">fas fa-file-alt</v-icon>
                </v-btn>
                <v-flex py-2 mt-1 class="white--text">
                    résumé
                </v-flex>
            </v-col>

            <v-col cols="4">
                <v-btn target="_blank" class="" icon href="https://github.com/mattquest">
                    <v-icon color="grey" size="60px">fab fa-github</v-icon>
                </v-btn>
                <v-flex py-2 mt-1 class="white--text">
                    github
                </v-flex>
            </v-col>
            <v-col cols="4">
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
            <form id="resumeForm" method="post" action="/download-resume">
                <input type="hidden" :value="recaptchaToken" name="token">
            </form>
        </v-row>
        <v-row class="pt-5 mt-5">
            <v-col class="pl-5 ml-5">
                <v-btn class="mx-5 px-5" icon @click="toggleWebsites()">
                    <v-icon class="teal--text accent-4--text" style="" size="60px">
                        fas fa-project-diagram
                    </v-icon>
                </v-btn>
                <p class="pt-5 white--text">
                    projects
                </p>
            </v-col>
            <v-col class="pr-5 mr-5">
                <v-btn class="mx-5 px-5" icon @click="toggleContact()">
                    <v-icon class="amber--text text--lighten-4" style="" size="60px">
                        fas fa-envelope
                    </v-icon>
                </v-btn>
                <p class="pt-5 white--text">
                    contact
                </p>
            </v-col>
        </v-row>
        </v-flex>
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
            toggleWebsites() {
                this.$emit('toggleWebsites');
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

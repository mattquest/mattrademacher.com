<template>
    <v-flex>
        <v-tooltip color="blue" bottom>
            <template v-slot:activator="{ on }">
                <v-btn :loading="botCheckPending" dark v-on="on" class="mx-5 px-5" icon @click="downloadResume">
                    <v-icon color="white" size="42px">fas fa-file-alt</v-icon>
                </v-btn>
            </template>
            <span>PDF Resume</span>
        </v-tooltip>
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
        <form id="resumeForm" method="post" action="/download-resume">
            <input type="hidden" :value="csrf" name="_token">
            <input type="hidden" :value="recaptchaToken" name="token">
        </form>
    </v-flex>
</template>

<script>
    var fileDownload = require('js-file-download');
    export default {
        name: "IconButtons",
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

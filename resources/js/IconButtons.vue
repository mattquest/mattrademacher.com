<template>
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
</template>

<script>
    export default {
        name: "IconButtons",

        methods: {
            toggleContact() {
                this.$emit('toggleContact');
            }
        }
    }
</script>

<style scoped>

</style>

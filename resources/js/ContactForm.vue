<template>
    <v-card class="" style="">
        <v-card-title>
            <v-flex class="text-center">
                Drop Me A Line
            </v-flex>
            <v-btn icon color="" @click="$emit('close')"><v-icon>fas fa-times</v-icon></v-btn>
        </v-card-title>
        <v-card-text>
            <v-text-field
                color="black"
                v-model="form.inputs.name"
                label="name"
            />
            <v-text-field
                color="black"
                v-model="form.inputs.email"
                label="email"
            />
            <v-text-field
                color="black"
                v-model="form.inputs.company"
                label="company"
            />
            <v-textarea
                color="black"
                v-model="form.inputs.textarea"
                label="what's up?"
            />
        </v-card-text>
        <v-card-actions>
            <div class="flex-grow-1"></div>
            <v-btn
                :disabled="form.pending"
                text
                color="grey darken-2"
                @click="form.reset()"
            >Clear</v-btn>
            <v-btn
                :loading="form.pending"
                color="grey darken-2"
                class="font-weight-bold"
                dark
                @click="submit()"
            >Submit</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
    class Form {
        constructor(inputs) {
            this.originalInputs = {};
            Object.assign(this.originalInputs, inputs);
            this.inputs = inputs;
            this.pending = false;
        }
        reset() {
            Object.assign(this.inputs, this.originalInputs);
            this.pending = false;
        }
    }
    export default {
        name: "ContactForm",
        data: () => ({
            form: new Form({name: null, email: null, company: null, textarea: null}),
        }),
        methods: {
            submit() {
                this.$recaptcha('contact').then(token => {
                    this.form.pending = true;
                    const data = {token};
                    Object.assign(data, this.form.inputs);
                    axios.post('/contact', data).then( r => {
                      if (r.data === 'success') {
                          this.form.reset();
                          this.$emit('close');
                          this.$emit('snackBar', 'Thanks! Your message has been sent!');
                      }
                    }).catch().then(() => this.form.pending = false);
                })
            },
        }
    }
</script>

<style scoped>

</style>

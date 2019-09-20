<template>
    <v-card>
        <v-card-title>
            <v-flex class="text-center">
                Drop Me A Line
            </v-flex>
            <v-btn icon color="blue-grey" @click="$emit('close')"><v-icon>fas fa-times</v-icon></v-btn>
        </v-card-title>
        <v-card-text>
            <v-text-field
                v-model="form.inputs.name"
                label="name"
            />
            <v-text-field
                v-model="form.inputs.email"
                label="email"
            />
            <v-text-field
                v-model="form.inputs.company"
                label="company"
            />
            <v-textarea
                v-model="form.inputs.textarea"
                label="what's up?"
            />
        </v-card-text>
        <v-card-actions>
            <div class="flex-grow-1"></div>
            <v-btn text color="blue-grey" @click="form.reset()">Clear</v-btn>
            <v-btn color="blue-grey" dark @click="submit()">Submit</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
    class Form {
        constructor(inputs) {
            this.originalInputs = {};
            Object.assign(this.originalInputs, inputs);
            this.inputs = inputs;
        }
        reset() {
            Object.assign(this.inputs, this.originalInputs);
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
                    const data = {token};
                    Object.assign(data, this.form.inputs);
                    axios.post('/contact', data).then( r => {
                      if (r.data === 'success') {
                          this.$emit('close');
                      }
                    });
                })
            },
        }
    }
</script>

<style scoped>

</style>

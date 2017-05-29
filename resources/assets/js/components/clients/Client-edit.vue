<template>
    <modal>
        <h4 class="modal-title" slot="header">Edit client</h4>
        <div slot="body">
            <form>
                <input name="_method" type="hidden" value="PUT">

                <div class="form-group" :class="{'has-error': form.errors.has('company')}">
                    <label class="control-label" for="company">Company
                        <small class="label label-success">required</small>
                    </label>
                    <input type="text" class="form-control" name="company" id="company" v-model="form.company" placeholder="Insert company name">
                    <span class="help-block" v-show="form.errors.has('company')">
                        {{ form.errors.get('company') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('contact_person')}">
                    <label class="control-label" for="contact_person">Contact person</label>
                    <input type="text" class="form-control" name="contact_person" id="contact_person" v-model="form.contact_person" placeholder="Insert contact person">
                    <span class="help-block" v-show="form.errors.has('contact_person')">
                        {{ form.errors.get('contact_person') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('email')}">
                    <label class="control-label" for="email">Email
                        <small class="label label-success">required</small>
                    </label>
                    <input type="email" class="form-control" name="email" id="email" v-model="form.email" placeholder="john@doe.com">
                    <span class="help-block" v-show="form.errors.has('email')">
                        {{ form.errors.get('email') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('address1')}">
                    <label class="control-label" for="address1">Address 1</label>
                    <input type="text" class="form-control" name="address1" id="address1" v-model="form.address1" placeholder="Insert address 1">
                    <span class="help-block" v-show="form.errors.has('address1')">
                        {{ form.errors.get('address1') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('address2')}">
                    <label class="control-label" for="address2">Address 2</label>
                    <input type="text" class="form-control" name="address2" id="address2" v-model="form.address2" placeholder="Insert address 2">
                    <span class="help-block" v-show="form.errors.has('address2')">
                        {{ form.errors.get('address2') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('city')}">
                    <label class="control-label" for="city">City</label>
                    <input type="text" class="form-control" name="city" id="city" v-model="form.city" placeholder="Insert city">
                    <span class="help-block" v-show="form.errors.has('city')">
                        {{ form.errors.get('city') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('state')}">
                    <label class="control-label" for="state">State</label>
                    <input type="text" class="form-control" name="state" id="state" v-model="form.state" placeholder="Insert state">
                    <span class="help-block" v-show="form.errors.has('state')">
                        {{ form.errors.get('state') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('zipcode')}">
                    <label class="control-label" for="zipcode">Zip code</label>
                    <input type="number" class="form-control" name="zipcode" id="zipcode" v-model="form.zipcode" placeholder="Insert zip code">
                    <span class="help-block" v-show="form.errors.has('zipcode')">
                        {{ form.errors.get('zipcode') }}
                    </span>
                </div><!-- form-group -->

                <div class="form-group" :class="{'has-error': form.errors.has('country')}">
                    <label class="control-label" for="country">Country</label>
                    <input type="text" class="form-control" name="country" id="country" v-model="form.country" placeholder="Insert country">
                    <span class="help-block" v-show="form.errors.has('country')">
                        {{ form.errors.get('country') }}
                    </span>
                </div><!-- form-group -->
            </form>
        </div><!-- body -->

        <div slot="footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button @click.prevent="update" type="button" class="btn btn-primary">Save</button>
        </div><!-- footer -->
    </modal>
</template>

<script>
    import Modal from './../Modal.vue'

    // Start of the default export
    export default {
        name: 'clientEdit',

        props: ['clientData'],

        components: {
            Modal
        },


        // Any imported mixins
        mixins: [],

        data () {
            return {
                form: new SparkForm({
                    company       : '',
                    email         : '',
                    address1      : '',
                    address2      : '',
                    city          : '',
                    state         : '',
                    zipcode       : '',
                    country       : '',
                    contact_person: ''
                })
            }
        },

        // Methods that should be accessible to both instance and template
        methods: {

            /**
             * Update selected client.
             */
            update() {
                let event = Bus
                Spark.put('clients/' +this.form.id, this.form)
                    .then(response => {
                        // Show popup success message.
                        swal('Client has been updated', "success")

                        // Hide modal popup.
                        $('#modal').modal('hide');

                        // Load the updated clients.
                        event.$emit('getClients')
                    })
                    .catch(error => {
                        console.log(error)
//                        swal("Oops...", "Something went wrong!", "error");
                    })
            }
        },

        // Computed properties that returns a formatted value of some kind
        computed: {
            // Use computed properties to access data in the Vuex store
        },

        // Custom watchers
        watch: {
            'clientData' (data) {
                this.form = new SparkForm(data)
            }
        },

        // Custom filters for displaying data
        filter: {},

        // Custom directives that can changes behaviour of HTML elements
        directives: {},

        // Vue instance lifecycle hooks
        // https://vuejs.org/v2/guide/instance.html#Lifecycle-Diagram
        beforeCreate () {
        },
        created () {
        },
        beforeMount () {
        },
        mounted () {
        },
        beforeUpdate () {
        },
        updated () {
        },
        beforeDestroy () {
        },
        destroyed () {
        }
    }

</script>

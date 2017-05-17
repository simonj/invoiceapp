<template>


    <!-- Show create client -->
    <client-create v-if="clientCreate"></client-create>

    <div class="container" v-else>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Clients overview
                        <a class="pull-right" href="#" @click.prevent="clientCreate = true">Create new client</a>
                    </div><!-- panel-heading -->
                    <div class="panel-body">


                        <button id="show-modal" @click="showModal = true">Show Modal</button>
                        <!-- use the modal component, pass in the prop -->
                        <modal v-if="showModal" @close="showModal = false">
                            <h4 class="modal-title" slot="header">Edit client</h4>

                            <div slot="body">

                                    <form>
                                        <div class="form-group" :class="{'has-error': form.errors.has('company')}">
                                            <label class="control-label" for="company">Company
                                                <small class="text-info">required</small>
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
                                                <small class="text-info">required</small>
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
                                            <label class="control-label" for="address">Address 2</label>
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
                                <button type="button" class="btn btn-default" @click="showModal = false">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div><!-- footer -->

                        </modal>

                        <!--<client-edit :edit-client-data="editFormData" v-if="showEditClient"></client-edit>-->

                        <span v-if="clients == 0">There is no clients created yet!</span>

                        <table v-else class="table table-hover">
                            <thead>
                            <tr>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Contact person</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr v-for="client in clients">
                                <td>{{ client.company }}</td>
                                <td>{{ client.email }}</td>
                                <td>{{ client.contact_person }}</td>

                                <!-- Edit Button -->
                                <td>
                                    <button class="btn btn-primary" @click="edit(client)">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                                <!-- Delete Button -->
                                <td>
                                    <button class="btn btn-danger-outline" @click="remove(client)">
                                        <i class="fa fa-times"></i>

                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</template>

<script>

    import axios from 'axios'
    import ClientCreate from './Client-create.vue'
    import Modal from './../Modal.vue'

    export default {

        name: 'Clients',

        components: {
            ClientCreate,
            Modal
        },

        data () {
            return {
                clients     : [],
                clientCreate: false,
                showModal   : false,
                form : new SparkForm({
                    company       : '',
                    email         : '',
                    address1      : '',
                    address2      : '',
                    city          : '',
                    state         : '',
                    zipcode       : '',
                    country       : '',
                    contact_person: ''
                }),
            };
        },

        mounted () {
            this.getClients();

            // Listen for created-client component.
            Bus.$on('clientCreate', (state) => {
                this.clientCreate = state
                // Load all invoices when a new one is created.
                this.getInvoices()
            })
        },

        methods: {

            /**
             * Fetch clients.
             */
            getClients () {
                var that = this
                axios.get('loadClients').then(response => {
                    that.clients = response.data
                })
                    .catch(error => {
                        console.log('error');
                        console.log(error);
                    });
            },


            /**
             * Edit client.
             */
            edit(client) {
                console.log('clicked edit')
                this.showEditClient = true
                this.editFormData   = client
            },

            /**
             * update client.
             */
            update() {
                Spark.post('/clients/', this.form)
                    .then(response => {
                        //TODO: show a sweet alert
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },

            /**
             * remove the specified client.
             */
            remove(client) {

                let that = this

                swal({
                    title             : "Are you sure?",
                    text              : "You will not be able to recover this client!",
                    type              : "warning",
                    showCancelButton  : true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText : "Yes, delete it!",
                    closeOnConfirm    : false,
                    html              : false
                }, function() {
                    // Remove client from database.
                    axios.delete('/clients/' + client.id).then(response => {
                        swal("Deleted!", "The client has been deleted.", "success");
                        that.getClients();
                    })
                        .catch(error => {
                            console.log('error');
                            console.log(error);
                        });
                });
            }
        }
    }

</script>

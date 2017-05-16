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

    export default {

        name: 'Clients',

        components: {
            ClientCreate
        },

        data () {
            return {
                clients       : [],
                clientCreate: false
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

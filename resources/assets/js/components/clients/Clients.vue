<template>
    <!-- Show create client -->
    <client-create v-if="clientCreate"></client-create>

    <div class="container" v-else>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- show edit client -->
                <client-edit v-show="editClientData" :clientData="editClientData"></client-edit>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Clients overview
                        <a class="pull-right" href="#" @click.prevent="clientCreate = true">Create new client</a>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <div class="text-center" v-if="clients == 0">
                            <p>There is no clients created yet!</p>
                        </div><!-- /.text-center -->


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
                                    <button data-toggle="modal" data-target="#modal" class="btn btn-primary" @click="edit(client)">
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
    import ClientEdit from './Client-edit.vue'
    import Modal from './../Modal.vue'

    export default {

        name: 'Clients',

        components: {
            ClientCreate,
            ClientEdit,
            Modal
        },

        data () {
            return {
                clients       : [],
                clientCreate  : false,
                editClientData: []
            };
        },

        mounted () {
            this.getClients();

            Bus.$on('getClients', (state) => {
                // Load all clients.
                this.getClients()
            })

            // Listen for created-client component.
            Bus.$on('clientCreate', (state) => {
                this.clientCreate = state
                // Load all clients when a new one is created.
                this.getClients()
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
                this.editClientData = client
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

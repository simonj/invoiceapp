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
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg width="13px" height="3px" viewBox="0 0 13 3" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="web-UI" transform="translate(-819.000000, -259.000000)" fill="#95A5A6">
                                                        <g id="table">
                                                            <g transform="translate(103.000000, 160.000000)">
                                                                <g id="client" transform="translate(20.000000, 85.000000)">
                                                                    <g id="Group-3" transform="translate(0.000000, 7.000000)">
                                                                        <g id="options" transform="translate(696.000000, 7.000000)">
                                                                            <g id="Group-4">
                                                                                <circle id="Oval-7" cx="1.5" cy="1.5" r="1.5"></circle>
                                                                                <circle id="Oval-7" cx="6.5" cy="1.5" r="1.5"></circle>
                                                                                <circle id="Oval-7" cx="11.5" cy="1.5" r="1.5"></circle>
                                                                            </g>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a @click="edit(client)" data-toggle="modal" data-target="#modal" href="#">Edit client</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a @click.prevent="remove(client)" href="#">Delete client</a></li>
                                        </ul>
                                    </div><!-- btn-group -->
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
    import ClientCreate from './client-create.vue'
    import ClientEdit from './client-edit.vue'
    import Modal from './../modal.vue'

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

                    // Add tooltip feature.
                    this.$nextTick(function() {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
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

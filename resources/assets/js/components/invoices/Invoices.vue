<template>

    <!-- Show create invoice -->
    <invoice-create v-if="invoiceCreate"></invoice-create>

    <!-- Show preview invoice -->
    <invoice-preview :item="form" v-else-if="invoicePreview"></invoice-preview>

    <div v-else class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Invoice overview
                        <a class="pull-right" v-if="user.stripe_connect_token" href="#" @click.prevent="invoiceCreate = true">Create new invoice</a>
                    </div><!-- panel-heading -->
                    <div class="panel-body">


                        <div class="text-center" v-if="! user.stripe_connect_token">
                            <span>
                                <p>You need to connect to stripe before created invoices</p>
                                <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_7ub2G1IqhsJ57jqISLdOrGWiC6gNXhzw&scope=read_only" class="stripe-connect light-blue"><span>Connect with Stripe</span></a>
                            </span>
                        </div><!-- /.text-center -->
                        <div class="text-center" v-else-if="invoices == 0">
                            <span>
                                <p>There is no invoice created yet</p>
                            </span>
                        </div><!-- /.text-center -->

                        <table class="table table-hover" v-else>
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th class="text-center">Client</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="invoice in invoices">
                                <td><span class="label label" :class="invoiceStatus(invoice.status)">{{ invoice.status }}</span></td>
                                <td class="text-center">{{ invoice.clients.company }}</td>
                                <td class="text-center">{{ invoice.amount | currency }},-</td>
                                <td class="text-center">
                                    <a @click.prevent="preview(invoice)" href="#">
                                        <button class="btn btn-info-outline">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>

                                    <a target="_blank" :href.literal="`/invoices/${invoice.reference_key}/pay`">
                                        <button class="btn btn-success-outline">
                                            <i class="fa fa-external-link"></i>
                                        </button>
                                    </a>

                                    <a @click.prevent="remove(invoice)" href="#">
                                        <button class="btn btn-danger-outline">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-12 -->
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import InvoiceCreate from './invoice-create.vue'
    import InvoicePreview from './invoice-preview.vue'

    export default {

        name: 'Invoices',

        components: {
            InvoicePreview
        },

        data() {
            return {
                user          : Spark.state.user,
                invoices      : [],
                invoiceCreate : false,
                invoicePreview: false,
                form          : {
                    client       : {},
                    notes        : '',
                    date         : '',
                    items        : [],
                    amount       : null,
                    reference_key: ''
                },
            };
        },

        mounted() {
            console.log(this.user);
            this.getInvoices()

            // Listen for created-invoice component.
            Bus.$on('invoiceCreate', (state) => {
                this.invoiceCreate = state
                console.log('invoiceCreate trigged')
                console.log(this)
                // Load all invoices when a new one is created.
                this.getInvoices()
            })

            // Listen for created-preview component.
            Bus.$on('invoicePreview', (state) => {
                this.invoicePreview = state

                // Load all invoices.
                this.getInvoices()
            })
        },

        methods: {

            /**
             *
             */
            getInvoices() {
                axios.get('fetchInvoices').then(response => {

                    this.invoices = response.data
                })
                    .catch(error => {
                        console.log('error');
                        console.log(error);
                    });
            },

            invoiceStatus(status) {
                let label = null


                if(status === 'created') {
                    label = 'label-info'
                } else if(status === 'sent') {
                    label = 'label-primary'
                } else if(status === 'reminder') {
                    label = 'label-warning'
                } else if(status === 'paid') {
                    label = 'label-success'
                }

                return label;
            },

            preview (invoice) {
                // set data for selected invoice.
                this.form.amount        = invoice.amount
                this.form.client        = invoice.clients
                this.form.date          = invoice.due_date
                this.form.items         = invoice.items
                this.form.notes         = invoice.notes
                this.form.reference_key = invoice.reference_key

                // Show preview invoice template.
                this.invoicePreview = true
            },

            remove(invoice) {

                let that = this

                swal({
                    title             : "Are you sure?",
                    text              : "You will not be able to recover this invoice!",
                    type              : "warning",
                    showCancelButton  : true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText : "Yes, delete it!",
                    closeOnConfirm    : false,
                    html              : false
                }, function() {

                    // Remove item from DOM.
                    that.invoices.splice(invoice, 1);


                    // Remove item from database.
                    axios.delete('invoices/' + invoice.id).then(response => {
                        swal("Deleted!", "Your invoice has been deleted.", "success");
                    })
                        .catch(error => {
                            console.log('error');
                            console.log(error);
                        });
                });
            }

        }
    };
</script>

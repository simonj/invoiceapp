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
                        <a class="pull-right" href="#" @click.prevent="invoiceCreate = true">Create new invoice</a>
                    </div><!-- panel-heading -->
                    <div class="panel-body">

                        <span v-if="invoices == 0">There is no invoice created yet!</span>

                        <table class="table table-hover" v-else="invoices > 0">
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
                                        <button class="btn btn-info-outline">
                                            <i class="fa fa-external-link"></i>
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
                invoices      : [],
                invoiceCreate : false,
                invoicePreview: false,
                form          : {
                    client: {},
                    notes : '',
                    date  : '',
                    items : [],
                    amount: null
                },
            };
        },

        mounted() {
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
                this.form.amount = invoice.amount
                this.form.client = invoice.clients
                this.form.date   = invoice.due_date
                this.form.items  = invoice.items
                this.form.notes  = invoice.notes

                // Show preview invoice template.
                this.invoicePreview = true
            }

        }
    };
</script>

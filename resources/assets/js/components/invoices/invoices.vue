<template>

    <!-- Show create invoice -->
    <invoice-create v-if="invoiceCreate"></invoice-create>

    <!-- Show preview invoice -->
    <invoice-preview :item="form" :isPreview="isPreview" v-else-if="invoicePreview"></invoice-preview>

    <div v-else class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <!-- show edit invoice -->
                <invoice-edit v-show="editInvoiceData" :invoiceData="editInvoiceData"></invoice-edit>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Invoice overview
                        <a class="pull-right" v-if="user.stripe_connect_token && user.trial_ends_at === true || user.current_billing_plan === true" href="#" @click.prevent="invoiceCreate = true">Create new invoice</a>
                        <a class="pull-right" href="/settings#/subscription">Add billing plan</a>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <div class="text-center" v-if="! user.stripe_connect_token">
                            <p>
                                You need to connect to stripe before creating invoices. <br/>
                                Do that by clicking on the dropdown at the top.
                            </p>
                        </div><!-- /.text-center -->
                        <div class="text-center" v-else-if="invoices == 0">
                            <p>There is no invoice created yet</p>
                        </div><!-- /.text-center -->

                        <table class="table table-hover" v-else>
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="invoice in invoices">
                                <td>{{ invoice.clients.company }}</td>
                                <td>{{ invoice.amount | currency }},-</td>
                                <td><span class="label label" :class="invoiceStatus(invoice.status)">{{ invoice.status }}</span></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg width="13px" height="3px" viewBox="0 0 13 3" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                                            <li><a @click.prevent="preview(invoice)" href="#">Preview invoice</a></li>
                                            <li><a @click="edit(invoice)" data-toggle="modal" data-target="#modal" href="#">Edit invoice</a></li>
                                            <li>
                                                <a target="_blank" :href.literal="`/invoices/${invoice.reference_key}/pay`">
                                                    Open invoice in new window
                                                </a>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li><a @click.prevent="remove(invoice)" href="#">Delete invoice</a></li>
                                        </ul>
                                    </div><!-- btn-group -->
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
    import InvoiceEdit from './invoice-edit.vue'
    import Modal from './../modal.vue'

    export default {

        name: 'Invoices',

        components: {
            InvoicePreview,
            InvoiceEdit,
            Modal
        },

        data() {
            return {
                user           : Spark.state.user,
                invoices       : [],
                invoiceCreate  : false,
                invoicePreview : false,
                isPreview      : false,
                editInvoiceData: [],
                form           : {
                    client       : {},
                    notes        : '',
                    date         : '',
                    items        : [],
                    amount       : null,
                    reference_key: '',
                    status       : ''
                },
            };
        },

        mounted() {
            this.getInvoices()

            // Listen for updating invoices.
            Bus.$on('getInvoices', (state) => {
                this.getInvoices()
            });

            // Listen for created-invoice component.
            Bus.$on('invoiceCreate', (state) => {
                this.invoiceCreate = state

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
                } else if(status === 'updated') {
                    label = 'label-info'
                }

                return label;
            },

            preview (invoice) {
                // Set preview data to true so we can hide the "send invoice button".
                this.isPreview = true

                // set data for selected invoice.
                this.form.amount        = invoice.amount
                this.form.client        = invoice.clients
                this.form.date          = invoice.due_date
                this.form.items         = invoice.items
                this.form.notes         = invoice.notes
                this.form.reference_key = invoice.reference_key
                this.form.status        = invoice.status

                // Show preview invoice template.
                this.invoicePreview = true
            },

            /**
             * Edit invoice.
             * @param invoice
             */
            edit(invoice) {
                this.editInvoiceData = invoice
            },

            /**
             * Remove invoice
             * @param invoice
             */
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
                    html              : false,
                    showLoaderOnConfirm: true,
                }, function() {
                    // Remove item from database.
                    axios.delete('invoices/' + invoice.id).then(response => {
                        swal("Deleted!", "Your invoice has been deleted.", "success");

                        that.getInvoices();
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

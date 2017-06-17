<template>
    <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">

        <div class="panel" :class="[item.status == 'paid' ? 'panel-success' : 'panel-default']">
            <div class="panel-heading">
                <span v-if="isPreview">
                    Ref ID: {{ item.reference_key }}
                </span>
                <span v-else-if="item.status == 'paid'">Invoice paid</span>
                <span v-else>Pay invoice</span>
                <a class="pull-right" href="#" @click.prevent="back">Back to your invoice</a>
            </div><!-- panel-heading -->
            <div class="panel-body invoice-box">
                <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tbody>
                                <tr>
                                    <td class="title">
                                        <!--<img src="/images/logo.png" style="width:100%; max-width:300px;">-->
                                    </td>
                                    <td class="text-right">
                                        Created: {{ today }}<br>
                                        Due: {{ item.date }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="information" v-show="item.client">
                        <td>
                            <table>
                                <tbody>
                                <tr>
                                    <td>
                                        {{ item.client.company }}<br/>
                                        {{ item.client.adress1 }}<br/>
                                        {{ item.client.state }} {{ item.client.city }} {{ item.client.zipcode }} <br/>
                                    </td>
                                    <td>
                                        {{ item.client.contact_person }}<br>
                                        {{ item.client.email }}<br>
                                        {{ item.notes }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="heading">
                        <td>Quantity</td>
                        <td>Description</td>
                        <td>Price</td>
                    </tr>
                    <tr class="item" v-for="item in item.items">
                        <td>{{ item.quantity }}</td>
                        <td>{{ item.description }}</td>
                        <td>{{ item.price }}</td>
                    </tr>
                    <tr class="total">
                        <td></td>
                        <td></td>
                        <td>
                            Total: {{ item.amount | currency }},-
                        </td>
                    </tr>
                    </tbody>
                </table>

                <div v-if="! isPreview" class="panel-footer">
                    <!-- Split button -->
                    <div class="btn-group pull-right">
                        <button v-if="spinner" style="font-size: 0.4em;" type="button" class="btn btn-primary">
                            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                        </button>
                        <button v-else @click.prevent="send" type="button" class="btn btn-primary">
                            Send invoice
                        </button>
                        <button v-if="!spinner" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-download"></i> Download PDF</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a :href="`invoices/${item.reference_key}/markPaid`"><i class="fa fa-dollar"></i> Mark as paid</a></li>
                        </ul>
                    </div>

                    <div class="clearfix"></div>

                </div><!-- panel-footer -->
            </div><!-- panel-body -->
        </div><!-- panel -->
    </div>
</div>
</div>
</template>

<script>
    import axios from 'axios'
    import { format } from 'moment'

    export default {
        name: 'InvoicePreview',

        props: ['item', 'isPreview'],

        components: {},

        data () {
            return {
                spinner: false
            }
        },

        mounted() {

        },

        methods: {
            /**
             * Create & send invoice to customer.
             */
            send () {
                // Show a spinner.
                this.spinner = true

                axios.post('/invoices', this.item).then(response => {
                    this.spinner = false
                    Bus.$emit('invoicePreview', false);
                    Bus.$emit('invoiceCreate', false);

                })
                .catch(error => {
                    console.log('error');
                    console.log(error);
                })
            },

            /**
             * Go back to previous page.
             */
            back () {
                Bus.$emit('invoicePreview', false);
            }
        },

        computed: {
            today() {
                return moment().format('D/M/YYYY');
            }
        },

    }
</script>

<style>
    .invoice-box {
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(3) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** Fix for panel **/
    .panel {
        overflow: visible !important;
    }
</style>

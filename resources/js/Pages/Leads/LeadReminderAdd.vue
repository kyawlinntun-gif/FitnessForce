<template>
    <Layout>
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <h1>
                        <Link href="/leads">Leads</Link>
                        <span class="breadcrumb-sep">/</span>
                        <Link :href="$route('lead.show', {lead})">Lead details</Link>
                        <span class="breadcrumb-sep">/</span>
                        Reminder Add
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Add reminder
                        </div>
                        <div class="card-body">
                            <ReminderForm :errors="errors" @reminderForm="handleSubmit"></ReminderForm>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';
import { Link } from '@inertiajs/inertia-vue';
import ReminderForm from './ReminderForm';

export default {
    name: 'Leads.LeadReminderAdd',
    components: { Layout, Link, ReminderForm },
    props: {
        lead: [],
        errors: []
    },
    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: ''
            }
        }
    },
    methods: {
        async handleSubmit(data) {
            this.reminder = data;
            await this.$inertia.post(`/leads/${this.lead.id}/reminders/add`, this.reminder);
        }
    }
}
</script>

<style>
.breadcrumb-sep {
    color: gray;
}
</style>

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
                        Reminder View
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
                            <ReminderForm :main-reminder="reminder" :errors="errors" @reminderForm="handleSubmit" @reminderFormClose="handleReminderClose"></ReminderForm>
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
    name: 'Leads.LeadReminderView',
    components: { Layout, Link, ReminderForm },
    props: {
        lead: [],
        errors: [],
        reminderProp: []
    },
    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: ''
            }
        }
    },
    created() {
        this.reminder = this.reminderProp;
    },
    methods: {
        async handleSubmit(data) {
            this.reminder = data;
            await this.$inertia.put(`/leads/${this.lead.id}/reminders/${this.reminderProp[0].id}`, this.reminder);
        },
        handleReminderClose() {
            console.log('close');
        }
    }
}
</script>

<style>
.breadcrumb-sep {
    color: gray;
}
</style>

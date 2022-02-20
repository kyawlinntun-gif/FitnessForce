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
                        Reminder add note
                    </h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Add note
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="handleSubmit">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea id="note" class="form-control" v-model="reminderNote.note"></textarea>
                                    <div v-if="errors.note" class="text-danger text-small">{{ errors.note }}</div>
                                </div>
                                <button type="submit" class="btn btn-success">Close</button>
                            </form>
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

export default {
    name: 'Leads.LeadReminderNote',
    components: {
        Layout, Link
    },
    props: {
        errors: [],
        lead: [],
        reminder: []
    },
    data() {
        return {
            reminderNote: {
                note: ''
            }
        }
    },
    methods: {
        async handleSubmit() {
            await this.$inertia.post(`/leads/${this.lead.id}/reminders/${this.reminder.id}/notes`, this.reminderNote);
        }
    }
}
</script>

<style>
.breadcrumb-sep {
    color: gray;
}
</style>


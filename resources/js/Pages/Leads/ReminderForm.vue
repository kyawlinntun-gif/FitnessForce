<template>
    <form @submit.prevent="handleSubmit">
        <div class="form-group">
            <label for="reminder">Reminder</label>
            <input type="text" class="form-control" id="reminder" v-model="reminder.reminder">
            <div v-if="errors.reminder" class="text-danger text-small">{{ errors.reminder }}</div>
        </div>
        <div class="form-group">
            <label for="reminder_date">Reminder date</label>
            <input type="date" class="form-control" id="reminder_date" v-model="reminder.reminder_date">
            <div v-if="errors.reminder_date" class="text-danger text-small">{{ errors.reminder_date }}</div>
        </div>
        <div class="form-group" v-if="reminder.id? false: true">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        <div class="form-group" v-else>
            <button type="submit" class="btn btn-success">Add reminder</button>
            <Link :href="$route('reminder.note', {lead, reminder})" class="btn btn-outline-danger">Close reminder</Link>
        </div>
    </form>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue';
export default {
    name: 'ReminderForm',
    props: {
        errors: [],
        mainReminder: [],
        mainLead: []
    },
    components: {
        Link
    },
    data() {
        return {
            reminder: {
                reminder: '',
                reminder_date: ''
            },
            lead: {}
        }
    },
    created() {
        if(this.mainReminder? true : false) {
            this.reminder = this.mainReminder[0];
        }
        if(this.mainLead? true: false) {
            this.lead = this.mainLead;
        }
    },
    methods: {
        handleSubmit() {
            this.$emit('reminderForm', this.reminder);
        }
    }
}
</script>

<style>

</style>

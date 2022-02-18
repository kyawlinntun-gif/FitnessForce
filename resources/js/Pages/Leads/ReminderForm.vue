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
            <button class="btn btn-outline-danger" @click.prevent="handleClose">Close reminder</button>
        </div>
    </form>
</template>

<script>
export default {
    name: 'ReminderForm',
    props: {
        errors: [],
        mainReminder: []
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
        if(this.mainReminder? true : false) {
            this.reminder = this.mainReminder[0];
        }
    },
    methods: {
        handleSubmit() {
            this.$emit('reminderForm', this.reminder);
        },
        handleClose() {
            this.$emit('reminderFormClose', this.reminder);
        }
    }
}
</script>

<style>

</style>

<template>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Reminders list
                </div>
                <div class="card-body" v-if="reminders.length > 0">
                    <ul class="list-group list-group-flush" v-for="reminder in reminders" v-bind:key="reminder.id">
                        <Link :href="$route('reminder.show', {lead: reminder.lead_id, reminder: reminder.id})" class="list-group-item">
                            <strong>{{ reminder.lead.name }}</strong><br>
                            {{ reminder.reminder }}
                        </Link>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue';

export default {
    name: 'ReminderList',
    props: {
        reminders: Array
    },
    components: {
        Link
    }
}
</script>

<style>

</style>

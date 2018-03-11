<template>
    <div>
        <a :class="className" href="#" class="list-group-item list-group-item-action">
            <slot>
            </slot>
        </a>
        <small :class="badgeClass" class="badge  float-right">{{ user}}</small>
    </div>
</template>

<script>
    export default {

        props: [
            'color',
            'user'

        ],
        computed: {
            className() {
                return 'list-group-item-' + this.color;
            },badgeClass() {
                return 'badge-' + this.color;
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

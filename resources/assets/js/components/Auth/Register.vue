<template>
    <div>

        <div class="panel panel-default">
            <div class="panel-heading">Register</div>

            <div class="panel-body">

                <form @submit.prevent="registerUser">
                    <p class="text-muted">Registra tu primer usuario ahora. Este usuario tendrá permisos de administrador.</p>
                    <div class="form-group">
                        <label for="name">Name</label>

                        <input id="name" type="text" class="form-control" name="name" v-model="user.name" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail Address</label>

                        <input id="email" type="email" class="form-control" name="email" v-model="user.email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control" name="password" v-model="user.password" required>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="user.password_confirmation"
                            required>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Registrar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        data() {
            return {
                business: [],
                user: []
            }
        },
        computed: {

        },
        methods: {
            registerUser() {
                axios.post('/register', {
                    name: this.user.name,
                    email: this.user.email,
                    password: this.user.password,
                    password_confirmation: this.user.password_confirmation,
                }).then(response => {
                    window.location.pathname = '/home';
                });
            }
        }
    }
</script>
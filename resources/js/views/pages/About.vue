<template>
    <div>
        <div class="col-lg-12 col-md-12 col-sm-4">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" v-model="username" placeholder="Username | Email"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" v-model="password" placeholder="Password"/>
                </div>
            </div>
            <button class="btn btn-dark btn-block" @click="userlogin">Login</button>
        </div>
    </div>
</template>
<script>
export default {
    data: function(){
        return {
            username:               '',
            password:               '',
        }
    },
    methods: {
        userlogin(){
            // console.log(this.username, this.password);
            if(this.username > ' ' && this.password > ' '){
                let url = 'api/login';
                axios.post(url, {username: this.username, password: this.password})
                .then((response) => {
                    // console.log(response.data);
                    localStorage.setItem('access_token', response.data.token);
                    localStorage.setItem('user_id', response.data.user_id);
                    localStorage.setItem('user_positions', response.data.user_position);
                    this.$router.push({
                        path: '/dashboard'
                    });
                });
            }
        }
    }
}
</script>
<template>
    <div>
        <div class="col-lg-12 col-md-12 col-sm-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <label for="username">Username Or Email</label>
                    <input type="text" class="form-control" placeholder="Username | Email" v-model="username"/>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" placeholder="password" v-model="password"/>
                </div>
            </div>
            <button class="btn btn-dark btn-block" @click="registeruser()">Register</button>
        </div>
    </div>
</template>
<script>
export default {
    data: function(){
        return {
            username:                       '',
            password:                       '',
        }
    },
    methods: {
        registeruser(){
            // console.log(this.username, this.password);
            if(this.username > '' && this.password > ''){
                let url = '/api/registeruser';
                axios.post(url, {username: this.username, password: this.password})
                .then((response) => {
                    if(response.data.response){
                        this.$toastr.s(response.data.message);
                    }else{
                        this.$toastr.e(response.data.message);
                    }
                });
            }else{
                this.$toastr.e(response.data.message);
            }
        }
    }
}
</script>
<script setup>
import MainLayout from "../layouts/MainLayout.vue";
import Contact from "../ components/Contact.vue";
import ContactList from "../ components/ContactList.vue";
import {onMounted, reactive, ref} from "vue";
import axios from "axios";

const contacts = reactive({});



const currentContact = ref({
    name: 'Name',
    surname: 'Surname',
    email: 'Email',
    phone: 'Phone',
    isFavorite: false
});

onMounted(() => {
    axios.get('http://localhost/api/contacts').then(res => {
        console.log(res.data.data)
        contacts.value = res.data.data
    })
})
const changeCurrentContact = (contact) => {
    currentContact.value = contact
}

const updateUserPhoto = (id,url) => {
contacts.value = contacts.value.map((item) => {
    if (item.id === id) {
        item.image = url;
        return item;
    }
    return item
})
}


</script>

<template>
<MainLayout>
    <section class="hero">
        <div class="hero__container _wrapper">
            <Contact :currentContact="currentContact" @update-user-photo="updateUserPhoto" contacts="contacts"/>
            <ContactList @changeCurrentContact="changeCurrentContact"  :contacts="contacts" :currentContact="currentContact"/>
        </div>
    </section>
</MainLayout>
</template>

<style scoped lang="scss">
.hero {
    padding: 48px 0;
}
._wrapper {
    display: flex;
    gap: 10px;
}
</style>

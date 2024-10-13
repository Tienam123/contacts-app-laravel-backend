<script setup>
import MainLayout from "../layouts/MainLayout.vue";
import Contact from "../ components/Contact.vue";
import ContactList from "../ components/ContactList.vue";
import {onMounted, onUpdated, reactive, ref} from "vue";
import axios from "axios";
import {useRoute} from "vue-router";
import {useRouter} from "vue-router";

const route = useRoute();
const router = useRouter();
onMounted(() => {
    console.log('mounted')
    loadContacts()
})


const page = ref(1);
const limit = ref(10);
const total_pages = ref(1);
const contacts = reactive([]);

const currentContact = ref({
    name: 'Name',
    surname: 'Surname',
    email: 'Email',
    phone: 'Phone',
    isFavorite: false
});

const changeCurrentContact = (contact) => {
    currentContact.value = contact
}
const incrementPage = async () => {
    loadContacts()
}
const loadContacts = async () => {
    const {data} = await axios.get(`http://localhost/api/contacts?page=${page.value}&limit=${limit.value}`)
    if (page.value === 1) {
        contacts.value = data.data
        total_pages.value = data.meta.last_page
    } else {
        contacts.value = [...contacts.value,...data.data]
    }
    page.value++
}

const updateUserPhoto = (id, url) => {
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
                <ContactList @changeCurrentContact="changeCurrentContact" :contacts="contacts" :page="page" :totalPage="total_pages"
                             :currentContact="currentContact" @incrementpage="incrementPage"/>

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

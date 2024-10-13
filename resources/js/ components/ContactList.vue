<script setup>
import logo from '../assets/avatar.jpg'
import ContactItem from "./ContactItem.vue";
const emit = defineEmits(['change-current-contact'])
const props = defineProps(['contacts'])
const changeCurrentContact =  (contact) => {
    emit('change-current-contact', contact)
}



</script>

<template>
    <div class="wrapper">
        <h2 class="title">Kontaktlar</h2>
        <div class="card">
         <div class="card-header">
             <div class="current-person">
                 <h3>Vladyslav Honchar</h3>
                 <div class="logo__wrapper">
                     <router-link to="/add-contact" class="link">
                         <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                             <path d="M8.15659 2.68683H4.81685C3.48083 2.68683 2.81281 2.68683 2.30252 2.94684C1.85365 3.17554 1.48872 3.54048 1.26001 3.98935C1 4.49964 1 5.16766 1 6.50368V13.1831C1 14.5192 1 15.1872 1.26001 15.6975C1.48872 16.1464 1.85365 16.5113 2.30252 16.74C2.81281 17 3.48083 17 4.81685 17H11.4963C12.8324 17 13.5003 17 14.0107 16.74C14.4596 16.5113 14.8245 16.1464 15.0532 15.6975C15.3132 15.1872 15.3132 14.5192 15.3132 13.1831V9.8434M14.1204 1.49405C14.7791 0.835314 15.8472 0.835314 16.506 1.49406C17.1647 2.1528 17.1647 3.22085 16.506 3.87959L8.90191 11.4837C8.62686 11.7587 8.4893 11.8962 8.32883 11.9946C8.18649 12.0818 8.03135 12.1461 7.86914 12.185C7.68609 12.2289 7.49159 12.2289 7.1026 12.2289H5.77104V10.8974C5.77104 10.5084 5.77104 10.3139 5.81498 10.1309C5.85394 9.96864 5.9182 9.8135 6.00539 9.67125C6.10375 9.5107 10.3153 5.29918 10.5904 5.02413" stroke="#394867" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                         </svg>
                         <span>Add new contact</span>
                     </router-link>
                     <img :src="logo" class="current-person__img" width="40" height="40" alt="logo">
                 </div>
             </div>
             <form class="form" @submit.prevent="() =>{}">
                 <button class="form__btn" type="submit">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                         <path
                             d="M18 18L13.8125 13.8125M15.5 8.75V8.75C15.5 12.4779 12.4779 15.5 8.75 15.5V15.5C5.02208 15.5 2 12.4779 2 8.75C2 5.02208 5.02208 2 8.75 2V2C10.5508 2 12.2779 2.71537 13.5512 3.98874L13.8125 4.25"
                             stroke="#394867" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     </svg>
                 </button>
                 <input class="form__input" type="text" name="" id="" placeholder="Kontakt qidirish">
             </form>
         </div>
            <ul class="card-list">
                <ContactItem v-for="contact of contacts.value" :contact="contact" :key="contact.id" @change-current-contact="changeCurrentContact" />
            </ul>
        </div>
    </div>
</template>

<style scoped lang="scss">
.wrapper {
    width: 100%;

}

.title {
    text-align: center;
    color: #212A3E;
    font-size: 26px;
    font-style: normal;
    font-weight: 500;
    line-height: 32px; /* 123.077% */
    margin-bottom: 20px;
}

.card {
    border-radius: 20px;
    background: #F6F9FA;
}
.logo__wrapper {
    display: flex;
    align-items: center;
    gap: 12px;
}
.link {
    display: flex;
}
.card-header {
    padding: 16px;
}

.current-person {
    display: flex;
    justify-content: space-between;
    align-items: center;

    &__img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }
}

.form {
    display: flex;
    padding: 8px 12px;
    border:1px solid #212A3E;
    border-radius: 8px;
    margin-top: 32px;
    // .form__btn
    &__btn {
        position: relative;
        &::before {
            content: "";
            position: absolute;
            width: 1px;
            height: 100%;
            top: 0;
            left: 28px;
            display: block;
            background-color: #212A3E;
        }
    }

    // .form__input
    &__input {
        &:focus-within {
            outline: none;
            border: none;
        }

        padding-left: 22px;
        background: inherit;
        width: 100%;
        height: 100%;


    }
}

.card-list {
    margin-top: 22px;
}


</style>

<script setup>
import logo from "../assets/avatar.jpg";
defineProps({
    contact: {
        type: Object,
        required: true,
        default: () => ({
            id: 1,
            name: 'Vladyslav',
            surname: 'Honchar',
            phone: '+380635262516',
            image:logo,
            email: 'dr.tienam123@gmail.com',
            isFavorite: false
        })
    }
})

const emit = defineEmits(["change-current-contact"]);
const handleClickContact = (contact) => {
    emit("changeCurrentContact", contact);
}
</script>

<template>
    <li class="card-item" @click="handleClickContact(contact)">
        <img width="80" height="80" class="card-item__img" :src="contact.image?contact.image:logo" alt="">
        <div class="card-item__info">
            <h4>{{contact.name}} {{contact.surname}}</h4>
            <p>{{contact.phone}}</p>
        </div>
        <div class="card-item__actions">
            <button class="card-item__button-favorite">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none">
                    <path
                        d="M9.15316 5.40838C10.4198 3.13613 11.0531 2 12 2C12.9469 2 13.5802 3.13612 14.8468 5.40837L15.1745 5.99623C15.5345 6.64193 15.7144 6.96479 15.9951 7.17781C16.2757 7.39083 16.6251 7.4699 17.3241 7.62805L17.9605 7.77203C20.4201 8.32856 21.65 8.60682 21.9426 9.54773C22.2352 10.4886 21.3968 11.4691 19.7199 13.4299L19.2861 13.9372C18.8096 14.4944 18.5713 14.773 18.4641 15.1177C18.357 15.4624 18.393 15.8341 18.465 16.5776L18.5306 17.2544C18.7841 19.8706 18.9109 21.1787 18.1449 21.7602C17.3788 22.3417 16.2273 21.8115 13.9243 20.7512L13.3285 20.4768C12.6741 20.1755 12.3469 20.0248 12 20.0248C11.6531 20.0248 11.3259 20.1755 10.6715 20.4768L10.0757 20.7512C7.77268 21.8115 6.62118 22.3417 5.85515 21.7602C5.08912 21.1787 5.21588 19.8706 5.4694 17.2544L5.53498 16.5776C5.60703 15.8341 5.64305 15.4624 5.53586 15.1177C5.42868 14.773 5.19043 14.4944 4.71392 13.9372L4.2801 13.4299C2.60325 11.4691 1.76482 10.4886 2.05742 9.54773C2.35002 8.60682 3.57986 8.32856 6.03954 7.77203L6.67589 7.62805C7.37485 7.4699 7.72433 7.39083 8.00494 7.17781C8.28555 6.96479 8.46553 6.64194 8.82547 5.99623L9.15316 5.40838Z"
                        stroke="#E4B408" stroke-width="2"/>
                </svg>
            </button>
            <button class="card-item__button-dotted">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </li>
</template>

<style scoped lang="scss">
.card-item {
    display: flex;
    cursor: pointer;
    align-items: center;
    padding: 10px 16px;

    &:nth-child(even) {
        background: rgba(57, 72, 103, 0.05);
    }
    &:hover {
        background: rgba(212, 219, 224, 0.8);
    }
    // .card-item__img
    &__img {
        border: 1px solid #212A3E;
        border-radius: 50%;
        width: 80px;
        height: 80px;
    }

    // .card-item__info
    &__info {
        flex: 1 1  auto;
        margin-left: 12px;
        h4 {
            color: #212A3E;
            font-size: 18px;
            font-style: normal;
            font-weight: 500;
            line-height: 24px; /* 133.333% */
            margin-bottom: 8px;
        }
    }

    // .card-item__actions
    &__actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    // .card-item__button-favorite
    &__button-favorite {
    }

    // .card-item__button-dotted
    &__button-dotted {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px;
        justify-content: space-between;
      span  {
          width: 3px;
          height: 3px;
          background-color: #212A3E;
          display: block;
          border-radius: 50%;
      }
    }
}
</style>

<template>
  <section class="contact-section" id="contato">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6 contact-title">
          <h2>Contato</h2>
        </div>
        <div class="col-6 contact-form">
          <form @submit.prevent="submitForm">
            <div class="mb-3">
              <input type="text" class="form-control" v-model="form.name" placeholder="Seu nome" required />
            </div>
            <div class="mb-3">
              <input type="tel" class="form-control" v-model="form.phone" placeholder="Seu telefone" required />
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" v-model="form.email" placeholder="Seu e-mail" required />
            </div>
            <div class="mb-3">
              <textarea class="form-control" v-model="form.message" placeholder="Sua mensagem" required></textarea>
            </div>
            <div class="mb-3">
              <label for="file" class="form-label">Anexar Arquivo</label>
              <input type="file" class="form-control" @change="handleFileUpload" />
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary" :disabled="processing">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
  name: 'ContactForm',
  setup() {
    const form = ref({
      name: '',
      phone: '',
      email: '',
      message: '',
      file: null,
    });

    const processing = ref(false);

    const submitForm = () => {
      processing.value = true;

      const formData = new FormData();
      formData.append('name', form.value.name);
      formData.append('phone', form.value.phone);
      formData.append('email', form.value.email);
      formData.append('message', form.value.message);
      if (form.value.file) {
        formData.append('file', form.value.file);
      }

      axios.post('/contact', formData)
        .then(() => {
          showToast('success', 'Sua mensagem foi enviada com sucesso! Breve entraremos em contato.');
          resetForm();
        })
        .catch(() => {
          showToast('error', 'Ocorreu um erro ao enviar sua mensagem.');
        })
        .finally(() => {
          processing.value = false;
        });
    };

    const handleFileUpload = (event) => {
      form.value.file = event.target.files[0];
    };

    const resetForm = () => {
      form.value.name = '';
      form.value.phone = '';
      form.value.email = '';
      form.value.message = '';
      form.value.file = null;
    };

    const showToast = (type, message) => {
      toastr[type](message); // Using globally configured toastr
    };

    return {
      form,
      submitForm,
      handleFileUpload,
      processing,
    };
  },
};
</script>

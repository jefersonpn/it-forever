<template>
  <Head title="Italianos Forever" />
  <header>
    <div class="header__container">
      <div class="logo">
        <img src="/images/logo.png" alt="Italianos Forever Logo" />
      </div>
        <nav class="nav-menu">
            <button @click="toggleMenu" class="hamburger" aria-label="Toggle navigation">
                <!-- Hamburger icon (3 bars) -->
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul id="menu-1-6411232" class="nav-menu__list" :class="{ 'is-active': isMenuOpen }" data-smartmenus-id="17226655878646082">
                <li class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-14">
                    <a href="#sobre" class="nav-menu__link">Sobre Nós</a>
                </li>
                <li class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-15">
                    <a href="#cidadania" class="nav-menu__link">Cidadania Italiana</a>
                </li>
                <li class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-16">
                    <a href="#contato" class="nav-menu__link">Contato</a>
                </li>
                <li v-if="$page.props.auth.user" class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-16">
                    <Link v-if="userRole === 'admin'" :href="route('admin.dashboard')" class="nav-menu__link">Dashboard</Link>
                    <Link v-if="userRole === 'client'" :href="route('client.backoffice')" class="nav-menu__link">Dashboard</Link>
                </li>
                <li v-if="$page.props.auth.user" class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-16">
                    <Link :href="route('logout')" method="post" class="nav-menu__link" as="button" type="button">
                        Sair
                    </Link>
                </li>
                <li v-else class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-16">
                    <Link :href="route('login')" class="nav-menu__link">Login</Link>
                </li>
                <!-- <li v-if="!$page.props.auth.user && $page.props.canRegister" class="nav-menu__item menu-item-type-custom menu-item-object-custom menu-item-16">
                    <Link :href="route('register')" class="nav-menu__link">Cadastre-se</Link>
                </li> -->
            </ul>
        </nav>

    </div>
  </header>

  <main>
    <!-- Existing Content Section -->
    <section class="content__section">
      <div class="content__overlay">
        <div class="content__text">
          <img src="/images/sello.png" alt="Sello" class="decorative-image" />
          <h1>
            Reconheça a sua<br /><span class="highlighted-text">cidadania italiana</span>
          </h1>
          <div class="divider"></div>
          <p>
            Se você é descendente de italianos<br />é seu direito ser reconhecido
          </p>
          <a href="#cidadania" class="button">Saiba Mais</a>
        </div>
        <div class="content__placeholder"></div>
      </div>
    </section>

    <!-- "Sobre Nós" Section -->
    <section class="about-section" id="sobre">
      <div class="about-container">
        <div class="about-content">
          <img class="passaporto" src="/images/passaporto.png" alt="passaporto" />
          <div class="about-text">
            <h2>SOBRE NÓS</h2>
            <div class="divider"></div>
            <ul>
              <li>Temos sede na Itália</li>
              <li>Mais de 20 anos de experiência</li>
              <li>Atendemos a mais de 30.000 brasileiros</li>
              <li>Somos membro do Conselho do Cidadão do Consulado Brasileiro em Milão.</li>
            </ul>
            <img src="/images/listra.png" alt="Sello" />
          </div>
        </div>
      </div>
    </section>

    <!-- Vantagens Section -->
    <section class="benefits-section" id="cidadania">
      <div class="benefits-container" id="benefits-container">
        <div class="benefits-content" id="benefits-content">
          <div class="benefits-heading-container" id="benefits-heading-container">
            <h2 class="benefits-title" id="benefits-title">VANTAGENS DE RECONHECER A SUA CIDADANIA ITALIANA</h2>
          </div>
        </div>
      </div>
    </section>

    <!-- "Cards" Section -->
    <section class="cards-section">
      <div class="cards-container">
        <div class="cards-content">
          <div class="cards-icon">
            <img src="/images/globo.png" alt="Icon" />
          </div>
          <div class="cards-heading-container">
            <h2 class="cards-title">Circule com facilidade</h2>
            <p>em vários países do mundo</p>
          </div>
        </div>
        <div class="cards-content">
          <div class="cards-icon">
            <img src="/images/capello.png" alt="Icon" />
          </div>
          <div class="cards-heading-container">
            <h2 class="cards-title">Acesse as melhores universidades</h2>
            <p>com menor investimento</p>
          </div>
        </div>
        <div class="cards-content">
          <div class="cards-icon">
            <img src="/images/mani.png" alt="Icon" />
          </div>
          <div class="cards-heading-container">
            <h2 class="cards-title">Tenha mais credibilidade</h2>
            <p>para desenvolver negócios com vários países</p>
          </div>
        </div>
        <div class="cards-content">
          <div class="cards-icon">
            <img src="/images/persone.png" alt="Icon" />
          </div>
          <div class="cards-heading-container">
            <h2 class="cards-title">Abra sua empresa</h2>
            <p>de forma rápida e sem complicações</p>
          </div>
        </div>
      </div>
    </section>

    <!-- "Services" Section -->
    <section class="services-section">
      <div class="services-container">
        <div class="services-content">
          <div class="services-heading-container">
            <span class="long-green-line"></span>
            <h2 class="services-title-placeholder">
              CONSULTORIA PARA O RECONHECIMENTO DA CIDADANIA ITALIANA
            </h2>
            <span class="short-red-line"></span>
          </div>
        </div>
        <div class="services-list">
          <h2 class="services-title">CONSULTORIA PARA O RECONHECIMENTO DA CIDADANIA ITALIANA</h2>
          <ul>
            <li>Atendimento personalizado</li>
            <li>Comunicação continuada do status de cada etapa</li>
            <li>Consultoria profissional</li>
            <li>Consultoria na solicitação para o cônjuge</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- "Statua" Section -->
    <section class="statua-section">
      <div class="statua-container">
        <div class="statua-content">
          <img src="/images/statua.png" alt="statua" />
        </div>
      </div>
    </section>

    <!-- "Parla" Section -->
    <section class="parla-section">
      <div class="parla-container">
        <div class="parla-content">
          <span class="long-green-line"></span>
          <img src="/images/parla.png" alt="parla" class="parla-img" />
          <h2 class="parla-title">O QUE DIZEM NOSSOS CLIENTES</h2>
          <span class="short-red-line"></span>
        </div>
      </div>
    </section>

    <!-- "Testimonial" Section -->
    <section class="testimonial-section">
      <div class="left-testimonial-container">
        <div class="apostrophe-sides">
          <img src="/images/apostrophe.png" alt="apostrophe" />
        </div>
        <div class="testimonial-content">
          <div class="testimonial-title">
            <h2>Regina Márcia Bertoncini Hennemann e Robson Avila Wolff</h2>
          </div>
          <div class="testimonial-text">
            <p>
              A empresa nos foi apresentada em 2011 e a partir daí fizemos a cidadania com toda orientação legal e
              acompanhamento do processo, sempre com profissionalismo e qualidade nos serviços prestados. Agradecemos a
              Ester e Giovanni, e sua equipe, pela atenção o carisma e carinho que nos tratam até hoje.
              <br />
              Regina Márcia Bertoncini Hennemann e Robson Avila Wolff
            </p>
          </div>
        </div>
      </div>
      <div class="meaddle-testimonial-container">
        <div class="apostrophe-meaddle">
          <img src="/images/apostrophe.png" alt="apostrophe" />
        </div>
        <div class="testimonial-content">
          <div class="testimonial-title">
            <h2>Matheus Tudela de Sà</h2>
          </div>
          <div class="testimonial-text">
            <p>
              Fui assistido em 2009 por Ester e Giovanni durante o mais importante e complexo projeto da minha carreira :
              a expatriação. Com uma abordagem firme e diligente me garantiram um accesso espontâneo à minha cidadania.
              Nada melhor do que dispor de profissionais com tradição e maestria.
              <br />
              Sales Engineering Manager – Cella Retail Solutions
            </p>
          </div>
        </div>
      </div>
      <div class="right-testimonial-container">
        <div class="apostrophe-sides">
          <img src="/images/apostrophe.png" alt="apostrophe" />
        </div>
        <div class="testimonial-content">
          <div class="testimonial-title">
            <h2>Erika Mendes Correia</h2>
          </div>
          <div class="testimonial-text">
            <p>
              Profissionais sérios, experientes, dedicados e apaixonados no suporte ao reconhecimento da cidadania
              italiana. O processo ocorreu tranquilamente de acordo com a descrição dos serviços prestados. Super
              recomendo!
              <br />
              Erika Mendes Correia – Clinical Trial Manager at Global Antibiotic R&D Partnership (GARDP) Genève
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- "Contact" Section && "Toast" Section -->
    <div id="app">
      <contact-form> </contact-form>
    </div>

    <!-- "Footer" Section -->
    <section class="footer-section">
      <div class="row footer-container">
        <div class="col-3 footer-content">
          <h3>Endereço</h3>
          <span class="separator-line"></span>
          <p>Via Nazionale 192/C – 40051 Altedo di Malalbergo (Bologna)</p>
        </div>
        <div class="col-3 footer-content">
          <h3>Contato</h3>
          <span class="separator-line"></span>
          <div>
            <ul>
              <li>
                <span><i class="fas fa-mobile-alt"></i></span>
                <span>Fixo: 051 581156 | Fax: 051 565550</span>
              </li>
              <li>
                <a href="https://wa.me/393922984330" target="_blank">
                  <span><i class="fab fa-whatsapp"></i></span>
                  <span>WhatsApp:+39 392.2984330</span>
                </a>
              </li>
              <li>
                <a href="mailto:info@aibm.it" target="_blank">
                  <span><i class="far fa-envelope"></i></span>
                  <span>info@aibm.it</span>
                </a>
              </li>
              <li>
                <a href="mailto:info@aibm.it" target="_blank">
                  <span><i class="far fa-envelope"></i></span>
                  <span>contato@italianosforever.com</span>
                </a>
              </li>
            </ul>
            <h6>Uma Empresa do Grupo AIBM</h6>
            <div class="aibm-logo">
              <img src="/images/aibm-logo.png" alt="AIBM Logo" />
            </div>
          </div>
        </div>
        <div class="col-3 footer-content">
          <h3>Redes Sociais</h3>
          <span class="separator-line"></span>
          <div class="social-icons">
            <a href="https://www.facebook.com/italianosforever" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="https://www.instagram.com/italianosforever/" target="_blank"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </section>

    <!-- "Partita IVA" Section -->
    <section class="partita-iva-section">
      <div class="partita-iva-container">
        <div class="d-flex justify-content-center align-items-center partita-iva-content">
          <p>Ass. Italo Brasiliani nel Mondo - P.Iva (CNPJ) 02674511205</p>
        </div>
      </div>
    </section>

    <!-- "Italian flag" Section -->
    <section class="italian-flag-section">
      <div class="italian-flag-container">
        <div class="italian-flag-content">
          <img src="/images/italian-flag.png" alt="italian-flag" />
        </div>
      </div>
    </section>

    <!-- "Copyright" Section -->
    <section class="copyright-section">
      <div class="copyright-container">
        <div class="col-12 copyright-content">
          <div class="col-12 d-flex align-items-center">
            <p class="mb-0 mr-2">Designed by </p>
            <a href="https://sinnapse.com" target="_blank"><img src="/images/sinnapse-logo.png" alt="sinnapse" style="height: 20px; width: auto;" /></a>
            <p class="mb-0 ms-2">
              and Recreated by <span class="highlighted-text"><a href="https://www.linkedin.com/in/jefersonpn/" target="_blank">Jeferson Nascimento</a></span>
            </p>
          </div>
        </div>
      </div>
    </section>
  </main>

  <a href="https://wa.me/393922984330" class="whatsapp-float" target="_blank"><i class="fab fa-whatsapp"></i></a>
</template>

<script setup>
    import { ref, onMounted } from 'vue';
    import { Head, Link, usePage } from '@inertiajs/vue3';

    const page = usePage();
    const userRole = ref('');

    onMounted(() => {
        const user = page.props.auth.user;

        if (user && user.roles && user.roles.length > 0) {
            userRole.value = user.roles[0].name;
        }
    });

    // States for authentication and registration (already present in your code)
    const authenticated = ref(false); // This should be set according to your app's authentication logic
    const canRegister = ref(true); // This should be set according to your app's logic

    // State to manage the visibility of the hamburger menu
    const isMenuOpen = ref(false);

    // Function to toggle the menu visibility
    const toggleMenu = () => {
        isMenuOpen.value = !isMenuOpen.value;
    };
</script>


<style scoped>
/* Add any scoped styles if necessary */
</style>

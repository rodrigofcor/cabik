<template>
<div class="container-xxl p-4">
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>DDD</label>
                <select class="form-control" v-model="ddd_id">
                    <option value="all">Todos</option>
                    <option v-for="(ddd, index) in ddds" :key="index" :value="index">{{ ddd }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Espécie</label>
                <select class="form-control" v-model="specie_id">
                    <option value="all">Todas</option>
                    <option v-for="(specie, index) in species" :key="index" :value="index">{{ specie }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Sexo</label>
                <select class="form-control" v-model="sex_id">
                    <option value="all">Todos</option>
                    <option value="M">Macho</option>
                    <option value="F">Fêmea</option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>Objetivo</label>
                <select class="form-control" v-model="objective_id">
                    <option value="all">Todos</option>
                    <option value="D">Doação</option>
                    <option value="F">Ajuda Financeira</option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>&nbsp;</label>
                <a type="button" class="btn btn-secondary form-control" aria-expanded="false" aria-controls="showMoreFilters"
                    data-bs-toggle="collapse" 
                    data-bs-target="#showMoreFilters"
                    v-on:click="resetMoreFilters()"
                ><i class="fa fa-ellipsis-h"></i> Detalhes</a>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>&nbsp;</label>
                <button v-on:click="search()" type="button" class="btn btn-primary form-control"><i class="fa fa-search"></i> Pesquisar</button>
            </div>
        </div>
    </div>
    <div class="collapse" id="showMoreFilters">
        <div class="row mt-3">
            <div class="col-md-2">
                <div class="form-group">
                    <label>Cidade</label>
                    <select v-if="ddd_id != 'all'" class="form-control" v-model="city_id">
                        <option value="all">Todas</option>
                        <option v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                    </select>

                    <select v-else disabled class="form-control" v-model="city_id">
                        <option value="all">Todas</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Raça</label>
                    <select v-if="specie_id != 'all'" class="form-control" v-model="breed_id">
                        <option value="all">Todas</option>
                        <option v-for="breed in breeds" :key="breed.id" :value="breed.id">{{ breed.name }}</option>
                    </select>

                    <select v-else disabled class="form-control" v-model="breed_id">
                        <option value="all">Todas</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Idade</label>
                    <select class="form-control" v-model="age_id">
                        <option value="all">Todos</option>
                        <option v-for="(age, index) in ages" :key="index" :value="index">{{ age }}</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Tamanho</label>
                    <select class="form-control" v-model="size_id">
                        <option value="all">Todos</option>
                        <option v-for="(size, index) in sizes" :key="index" :value="index">{{ size }}</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Cuidados especiais</label>
                    <select class="form-control" v-model="special">
                        <option value="all">Indiferente</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Castração</label>
                    <select class="form-control" v-model="castration_id">
                        <option value="all">Indiferente</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="row row-cols-1 row-cols-md-2 g-4">

            <div v-for="pet in results.data" :key="pet.id" class="col">
                <div class="card">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img :src="pet.photo" class="img-fluid rounded-start" alt="Foto do pet">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title">{{ pet.title }}</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Tamanho:</strong> {{ pet.size }}</li>
                                <li class="list-group-item"><strong>Cuidados Especiais:</strong> {{ pet.special }}</li>
                                <li class="list-group-item"><strong>Castrado:</strong> {{ pet.castration }}</li>
                                <li class="list-group-item"><strong>Objetivo:</strong> {{ pet.objective }}</li>
                            </ul>
                            
                            <div class="float-end mb-2">
                                <button type="button" class="btn btn-outline-secondary" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalPetSeeMore"
                                    :data-bs-title="pet.title"
                                    :data-bs-name="pet.name"
                                    :data-bs-specie="pet.specie"
                                    :data-bs-breed="pet.breed"
                                    :data-bs-sex="pet.sex"
                                    :data-bs-age="pet.age"
                                    :data-bs-size="pet.size"
                                    :data-bs-special="pet.special"
                                    :data-bs-castration="pet.castration"
                                    :data-bs-objective="pet.objective"
                                    :data-bs-localization="pet.localization"
                                    :data-bs-description="pet.description"
                                    :data-bs-srcs="pet.srcs"
                                >Ver mais</button>

                                <button href="#" class="btn btn-success"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modalContact"
                                    :data-bs-photo="pet.photo"
                                    :data-bs-title="pet.title"
                                    :data-bs-tutorPhoto="pet.tutorPhoto"
                                    :data-bs-tutor="pet.tutor"
                                    :data-bs-petId="pet.id"

                                    data-bs-userName=""
                                    data-bs-userPhone=""
                                    data-bs-userEmail=""
                                >Contato</button>

                                <a v-show="pet.objective == 'Doação e ajuda financeira' || pet.objective == 'Ajuda Financeira'" href="#" class="btn btn-primary">Pix</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

    <div class="mt-4">
        <pagination :data="results" align="center" @pagination-change-page="search" :key="paginationKey"></pagination>
    </div>
</div>
</template>
<script>
import pagination from 'laravel-vue-pagination'

export default {
    name: 'SearchPet',
    components:{
        pagination
    },
    props: {
        ddds: Object,
        species: Object,
        ages: Object,
        sizes: Object,
    },
    data() {
        return {
            ddd_id: 'all',
            specie_id: 'all',
            sex_id: 'all',
            objective_id: 'all',
            cities: 'all',
            city_id: 'all',
            breeds: 'all',
            breed_id: 'all',
            age_id: 'all',
            size_id: 'all',
            special: 'all',
            castration_id: 'all',
            results: [],
        }
    },
    created() {
        this.search()
    },
    watch: {
        ddd_id: function () {
           this.loadCities()
        },
        specie_id: function () {
           this.loadBreeds()
        },
    },
    methods: {
        loadCities: function async() {
            this.city_id = 'all'

            axios.get("/api/ddd/" + this.ddd_id + "/city", {
                params: {
                   /* param: this.param, */
                }
            })
            .then((response) => {
                this.cities = response.data        
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        loadBreeds: function async() {
            this.breed_id = 'all'

            axios.get("/api/specie/" + this.specie_id + "/breed", {
                params: {
                   /* param: this.param, */
                }
            })
            .then((response) => {
                this.breeds = response.data        
            })
            .catch(function (error) {
                console.log(error)
            })
        },
        resetMoreFilters() {
            this.city_id = 'all'
            this.breed_id = 'all'
            this.age_id = 'all'
            this.size_id = 'all'
            this.special = 'all'
            this.castration_id = 'all'
        },
        search: function async(page = 1) {
            axios.get("/api/pet/search?page=" + page, {
                params: {
                    ddd_id: this.ddd_id,
                    specie_id: this.specie_id,
                    sex_id: this.sex_id,
                    objective_id: this.objective_id,
                    city_id: this.city_id,
                    breed_id: this.breed_id,
                    age_id: this.age_id,
                    size_id: this.size_id,
                    special: this.special,
                    castration_id: this.castration_id,
                }
            })
            .then((response) => {
                this.results = response.data   
            })
            .catch(function (error) {
                console.log(error)
            })
        },
    }
}
</script>
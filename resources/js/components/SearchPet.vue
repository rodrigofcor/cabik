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
                ><i class="fa fa-ellipsis-h"></i> Detalhes</a>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-primary form-control"><i class="fa fa-search"></i> Pesquisar</button>
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
</div>
</template>
<script>
export default {
    name: 'SearchPet',
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
        }
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
    }
}
</script>
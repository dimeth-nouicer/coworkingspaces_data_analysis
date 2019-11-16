import Vue       from 'vue';
import Router    from 'vue-router';

import Homepage  from '../components/Homepage.vue';
import Signin    from '../components/Signin.vue';
import Signup    from '../components/Signup.vue';
import Home      from '../components/Home.vue';
import Blog      from '../components/Blog.vue';
import Layout    from '../components/Layout.vue';
import Dashboard from '../components/Dashboard.vue';
import Comdashboard from '../components/Comdashboard.vue';
import Teams     from '../components/Teams.vue';
import Newteam   from '../components/Newteam.vue';
import Team      from '../components/Team.vue';
import Aboutus   from '../components/Aboutus.vue';
import Contactus from '../components/Contactuss.vue'; 
import Story     from '../components/Story.vue';
import Offers    from '../components/Offers.vue';
import Members   from '../components/Members.vue';
import Newmember from '../components/Newmember.vue';
import StoryEdit from '../components/StoryEdit.vue';
import Chat      from '../components/Chat.vue';
import ReadStory from '../components/ReadStory.vue';

const routes = [
   {
    path: '/',
    component: Homepage,
    children: [
      { path: '/blog', component: Blog},
      { path: '/aboutus', component: Aboutus },
      { path: '/contactus', component: Contactus },
      { path: '/signin', component: Signin },
      { path: '/signup', component: Signup },
      { path: '',        component: Home   },
      { path: '/read/:id',        component: ReadStory   },
      
    ]
  },

  {
    path: '/dashboard',
    component: Layout,
    children: [
      { path: '', component: Dashboard, name: "dashboard" },
      { path: 'teams', component: Teams, name: 'teams'     },
      { path: 'comdashboard', component: Comdashboard, name: 'comdashboard'},
      { path: 'storyedit', component: StoryEdit, name:'storyedit'},
      { path: 'story', component:Story, name: 'story'}, 
      { path: 'newteam', component: Newteam,   name: 'newteam' },
      { path: 'offers', component: Offers, name: 'offers'},
      { path: 'members', component: Members, name: 'members'},
      { path: 'newmember', component: Newmember,   name: 'newmember' },
      { path: 'chat', component: Chat,   name: 'chat' },
    ]
  }
];

Vue.use(Router);

export default new Router({
  mode: 'history',
  routes
});

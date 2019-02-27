import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { ArticleListComponent } from './article-list/article-list.component';
import { HttpClientModule } from '@angular/common/http';
import { RouterModule, Routes } from '@angular/router';
import { EmbedVideo } from 'ngx-embed-video';

const appRoutes: Routes = [
  { path: '', redirectTo: '/article-list', pathMatch: 'full' },
  {
    path: 'article-list',
    component: ArticleListComponent
  } /*,
  {
    path: 'article-view/:id',
    component: ArticleViewComponent
  } */
];
@NgModule({
  declarations: [
    AppComponent,
    ArticleListComponent
  ],
  imports: [
    BrowserModule,
    RouterModule.forRoot(appRoutes),
    HttpClientModule,
    EmbedVideo.forRoot()
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }

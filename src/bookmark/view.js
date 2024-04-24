/**
 * WordPress dependencies
 */
import { store, getContext } from "@wordpress/interactivity";

const { state } = store("favorite-bookmarks-block", {
  state: {
    allBookmarks: [],
  },
  actions: {
    toggle: () => {
      const context = getContext();
      context.isBookmarked = !context.isBookmarked;

      // Get all bookmarks from local storage or an empty array.
      let allBookmarks = localStorage.getItem("favorite-bookmarks-block") || "[]";
      allBookmarks = JSON.parse(allBookmarks);

      // Add or remove from our array of bookmarks.
      if (context.isBookmarked && !allBookmarks.includes(context.postId)) {
        allBookmarks.push(context.postId);
      } else if (
        !context.isBookmarked &&
        allBookmarks.includes(context.postId)
      ) {
        const index = allBookmarks.indexOf(context.postId);
        allBookmarks.splice(index, 1);
      }

      // Save the updated array of bookmarks to local storage.
      localStorage.setItem("favorite-bookmarks-block", JSON.stringify(allBookmarks));
      state.allBookmarks = allBookmarks;

      // Counting bookmarks.
      let bookmarksCount = state.allBookmarks.length;
      state.bookmarksCount = bookmarksCount;
      console.log('Count ' + bookmarksCount);

    },
  },
  callbacks: {
    init: () => {
      const context = getContext();

      // Get all bookmarks from local storage or an empty array.
      let bookmarks = localStorage.getItem("favorite-bookmarks-block") || "[]";
      state.allBookmarks = JSON.parse(bookmarks);

      console.log("init", state.allBookmarks);

      // Check if the post is already bookmarked and toggle.
      if (context.postId && state.allBookmarks.includes(context.postId)) {
        store("favorite-bookmarks-block").actions.toggle();
      }
    },
    initReadingList: () => {
      // Get all bookmarks from local storage or an empty array.
      let bookmarks = localStorage.getItem("favorite-bookmarks-block") || "[]";
      state.allBookmarks = JSON.parse(bookmarks);

      console.log("init", state.allBookmarks);

      // Counting bookmarks.
      let bookmarksCount = state.allBookmarks.length;
      state.bookmarksCount = bookmarksCount;

      console.log('Count ' + bookmarksCount);
      console.log(bookmarks);

    },
  },
});

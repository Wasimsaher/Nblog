import Link from "next/link";
import { getPosts } from "@/lib/api";

export default async function HomePage() {
  let posts;
  let error = "";

  try {
    posts = await getPosts();
  } catch {
    error = "Could not load posts. Make sure the Laravel backend is running on port 8000.";
  }

  return (
    <main className="container">
      <div className="page-header">
        <h1>All Posts</h1>
        <p>Browse the latest articles from the blog</p>
      </div>

      {error && <div className="error-message">{error}</div>}

      {posts && posts.length === 0 && (
        <div className="empty-state">
          <div className="empty-state__icon">📝</div>
          <div className="empty-state__title">No posts yet</div>
          <p>Create your first post to get started.</p>
          <Link href="/posts/create" className="btn btn--accent" style={{ marginTop: "1rem" }}>
            + Create Post
          </Link>
        </div>
      )}

      {posts && posts.map((post) => (
        <Link
          key={post.id}
          href={`/posts/${post.id}`}
          className="post-card animate-in"
        >
          <div className="post-card__title">{post.title}</div>
          <div className="post-card__desc">{post.description}</div>
          <div className="post-card__meta">
            {new Date(post.created_at).toLocaleDateString("en-US", {
              year: "numeric",
              month: "long",
              day: "numeric",
            })}
          </div>
        </Link>
      ))}
    </main>
  );
}

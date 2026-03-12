import Link from "next/link";
import { getPost } from "@/lib/api";
import { notFound } from "next/navigation";
import DeleteButton from "./DeleteButton";

interface Props {
  params: Promise<{ id: string }>;
}

export default async function PostPage({ params }: Props) {
  const { id } = await params;
  let post;

  try {
    post = await getPost(Number(id));
  } catch {
    notFound();
  }

  return (
    <main className="container">
      <Link href="/" className="back-link">
        ← Back to posts
      </Link>

      <div className="post-detail animate-in">
        <h1 className="post-detail__title">{post.title}</h1>
        <div className="post-detail__body">{post.description}</div>
        <div className="post-detail__meta">
          Created{" "}
          {new Date(post.created_at).toLocaleDateString("en-US", {
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "2-digit",
            minute: "2-digit",
          })}
          {post.updated_at !== post.created_at && (
            <>
              {" · "}Updated{" "}
              {new Date(post.updated_at).toLocaleDateString("en-US", {
                year: "numeric",
                month: "long",
                day: "numeric",
                hour: "2-digit",
                minute: "2-digit",
              })}
            </>
          )}
        </div>
        <div className="post-detail__actions">
          <Link href={`/posts/${post.id}/edit`} className="btn btn--accent btn--sm">
            ✏️ Edit
          </Link>
          <DeleteButton postId={post.id} />
        </div>
      </div>
    </main>
  );
}

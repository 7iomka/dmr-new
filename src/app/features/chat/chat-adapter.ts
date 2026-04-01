export type ChatMessage = { id: string; text: string; isMine: boolean; createdDate: string };
export type ChatDateGroup = { id: string; date: string; messages: ChatMessage[] };
export type ChatDialog = {
  id: string;
  title: string;
  subtitle: string;
  unreadCount: number;
  groups: ChatDateGroup[];
};

export type BackendConversation = {
  id: number;
  subject: string;
  unreadCount: number | null;
  lastMessageAt: string;
  lastMessage: { id: number; content: string | null; createdDate: string } | null;
};

type AdapterHelpers = {
  generateId: (prefix: string) => string;
  toIsoDate: (date: Date) => string;
};

export function isBackendConversationList(data: unknown[]): data is BackendConversation[] {
  return data.every(
    (item) => typeof item === 'object' && item !== null && 'lastMessageAt' in item && 'subject' in item,
  );
}

export function mapBackendConversationsToDialogs(
  conversations: BackendConversation[],
  helpers: AdapterHelpers,
): ChatDialog[] {
  return conversations.map((conversation) => {
    const createdDate = conversation.lastMessage?.createdDate ?? conversation.lastMessageAt;
    return {
      id: String(conversation.id),
      title: conversation.subject || 'Диалог',
      subtitle: 'Чат поддержки',
      unreadCount: conversation.unreadCount ?? 0,
      groups: buildThreadGroupsFromLastMessage(
        String(conversation.id),
        createdDate,
        conversation.lastMessage?.content,
        helpers,
      ),
    };
  });
}

function buildThreadGroupsFromLastMessage(
  conversationId: string,
  lastMessageAt: string,
  lastContent: string | null | undefined,
  helpers: AdapterHelpers,
): ChatDateGroup[] {
  const lastDate = new Date(lastMessageAt);
  const earlierDate = new Date(lastDate.getTime() - 90 * 60 * 1000);
  const latestDate = new Date(lastDate.getTime());

  return [
    {
      id: helpers.generateId('group'),
      date: helpers.toIsoDate(lastDate),
      messages: [
        {
          id: `srv-${conversationId}-1`,
          text: `История диалога #${conversationId}`,
          isMine: true,
          createdDate: earlierDate.toISOString(),
        },
        {
          id: `srv-${conversationId}-2`,
          text: lastContent?.trim() || 'Без текста',
          isMine: false,
          createdDate: latestDate.toISOString(),
        },
      ],
    },
  ];
}

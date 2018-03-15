package toveisliste;

public class Toveisliste {

    public static class BidirectionalList<E> {

        ListNode<E> head;
        ListNode<E> tail;
        ListNode<E> current;

        int size;

        public BidirectionalList() {
            size = 0;
            head = new ListNode();
            tail = new ListNode();
            current = new ListNode();
            head.next = tail;
            tail.prev = head;
            current = head;
        }

        public void insertBefore(E x) {
            if (current.equals(head)) {
                throw new IndexOutOfBoundsException("Utenfor listen");
            }
            ListNode<E> newNode = new ListNode(current.prev, current, x);
            newNode.prev.next = newNode;
            newNode.next.prev = newNode;
            size++;
        }

        public void insertAfter(E x) {
            if (current.equals(tail)) {
                throw new IndexOutOfBoundsException("Utenfor listen");
            }
            ListNode<E> newNode = new ListNode(current, current.next, x);
            newNode.prev.next = newNode;
            newNode.next.prev = newNode;
            size++;
        }

        public void advance() {
            if (current.equals(tail)) {
                throw new IndexOutOfBoundsException("Utenfor listen");
            }
            current = current.next;
        }

        public void retreat() {
            if (current.equals(head)) {
                throw new IndexOutOfBoundsException("Utenfor listen");
            }
            current = current.prev;
        }

        public E retrieve() {
            if (!isValid()) {
                throw new NullPointerException("Ugyldig element");
            }
            return current.element;
        }

        public E remove() {
            if (!isValid()) {
                throw new NullPointerException("Ugyldig element");
            }
            current.prev.next = current.next;
            current.next.prev = current.prev;
            size--;
            return current.element;
        }

        @Override
        public String toString() {
            String s = "ToString: ";
            ListNode node = head.next;
            while (node.next != null) {
                s += node.element + " ";
                node = node.next;
            }
            return s;
        }

        public boolean equals(Object o) {
            return (this == o);
        }

        private boolean isValid() {
            return current.element != null;
        }

        public int size() {
            return size;
        }

        public void first() {
            current = head.next;
        }

        public void last() {
            current = tail.prev;
        }

        public void moveToHead() {
            current = head;
        }

        public void moveToTail() {
            current = tail;
        }
    }

    public static void main(String[] args) {

        BidirectionalList s = new BidirectionalList();
        s.insertAfter("Første");
        s.advance();
        s.insertBefore("Andre");
        s.retreat();
        
        Object element1 = s.retrieve();
        System.out.println("Retrieve: " + element1);

        Object element2 = s.remove();
        System.out.println("Remove: " + element2);

        BidirectionalList s2 = new BidirectionalList();
        System.out.println("Equals: " + s2.equals(s));
        s2 = s;
        System.out.println("Equals: " + s2.equals(s));
        
        s.moveToHead();
        s.insertAfter("Tredje");
        s.moveToTail();
        s.insertBefore("Fjerde");
        System.out.println(s.toString());
        
    }

    private static class ListNode<anyType> {

        ListNode<anyType> prev;
        ListNode<anyType> next;
        anyType element;

        public ListNode() {
        }

        public ListNode(ListNode<anyType> prev, ListNode<anyType> next, anyType element) {
            this.prev = prev;
            this.next = next;
            this.element = element;
        }

    }

}
